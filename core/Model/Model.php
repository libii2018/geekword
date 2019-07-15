<?php

namespace Core\Model;

use Core\Database\MysqlDatabase;

class Model {

    protected $table;

    protected $db;


    public function __construct(MysqlDatabase $db){

        $this->db = $db;
        // var_dump($this->db);

        if(is_null($this->table)){

            $parts = explode('\\', get_class($this));

            $class_name = end($parts);
    
            $this->table = strtolower(str_replace('Table', '', $class_name));

        }


    }

    public function all(){

        return $this->query("SELECT * FROM ". $this->table ."");

    }

    public function find($id){

        return $this->query("SELECT * FROM " . $this->table ." WHERE id = ?", [$id], true);
    }

    public function update($id,$fields){

        $sql_parts = [];

        $attributes = [];

        foreach($fields as $k => $v){

            $sql_parts[] = "$k = ?";

            $attributes[] = $v;
        }

        $attributes[] = $id;

        $sql_parts = implode(',', $sql_parts);

        return $this->query("UPDATE " . $this->table ." SET $sql_parts WHERE id = ?", $attributes, true);
    }

    
    public function delete($id){

        $name_t = $this->table;

        return $this->query("DELETE FROM  {$name_t} WHERE {$name_t} . id = ?", [$id], true);
    }

    public function create($fields){

        $sql_parts = [];

        $attributes = [];

        foreach($fields as $k => $v){

            $sql_parts[] = "$k = ?";

            $attributes[] = $v;
        }

        $sql_parts = implode(',', $sql_parts);

        $name_t = $this->table;

        return $this->query("INSERT INTO {$name_t} SET $sql_parts", $attributes, true);
    }

    public function extract($key, $value){

        $record = $this->all();

        $return = [];

        foreach($record as $k => $v){

            $return[$v->$key] = $v->$value;

        }

        return $return;
    }


    public function query($statement, $attributes = null, $one = false){

        if($attributes){

            return $this->db->prepare(

                $statement, 

                $attributes, 

                str_replace('Table', 'Entity', get_class($this)),

                $one
            );

        } else {

            return $this->db->query(

                $statement, 

                str_replace('Table', 'Entity', get_class($this)),

                $one
            );
        }

    }

}