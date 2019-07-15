<?php

namespace Core\Auth;

use Core\Database\MysqlDatabase;

class DBAuth {

    private $db;

    public function __construct(MysqlDatabase $db){

        $this->db = $db;
        
    }

    public function grtUserId(){

        if($this->logged()){

            return $_SESSION['auth'];

        }

        return false;
        
    }

    public function login($username, $password){

        $user = $this->db->prepare('SELECT * FROM user WHERE username = ?', [$username],null,true);

        if($user){

            if($user->password === sha1($password)){

                $_SESSION['auth'] = $user->id;

                return true;
            }
        }

        return false;


    }

    public function logged(){

        return $_SESSION['auth'];

    }

}