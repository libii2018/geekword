<?php

    namespace App\Model;

    use Core\Model\Model;

    class GrandeCategoriesModel extends Model {

        public function getGrandeCategories(){

            $this->db->query("SELECT * FROM grandes_categories");

            return $this->db->resultSet();
        }

        public function updateGrandeCategories($data){
            $this->db->query('UPDATE articles SET nom = :nom, slug = :slug WHERE id = :id');
            // Bind values 
            $this->db->bind(':nom', $data['nom']);
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':slug', $data['slug']);
    
            // Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getGrandeCategoriesById($id){

            $this->db->query("SELECT * FROM grandes_categories WHERE id = :id");

            return $this->db->resultSet();
        }

        public function deleteGrandeCategories($id){
            $this->db->query('DELETE FROM grandes_categories WHERE id = :id');
            // Bind values 
            $this->db->bind(':id', $id);
    
            // Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }

    

    

    