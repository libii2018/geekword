<?php

namespace App\Model;

use Core\Model\Model;

    class UsersModel extends Model {


        public function getUsers(){

            $this->db->query('SELECT * FROM users');
    
            return $this->db->resultSet();
        }

        public function updateUsers($data){
            $this->db->query('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id');
            // Bind values 
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':id', $data['id']);
    
            // Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getUsersById($id){

            $this->db->query("SELECT * FROM users WHERE id = :id");

            return $this->db->resultSet();
        
        }

        public function addUsers($data){

            $this->db->query('INSERT INTO users (name, email, password) VALUES(:name,  :email, :password)');
            // Bind values 
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
    
            // Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteUsers($id){
            $this->db->query('DELETE FROM users WHERE id = :id');
            // Bind values 
            $this->db->bind(':id', $id);
    
            // Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // Register
        public function register($data){
            $this->db->query('INSERT INTO users (name, email, password,  img, admin) VALUES(:name, :email, :password, :img, :admin)');
            
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':img', $data['img']);
            $this->db->bind(':admin', $data['admin']);

            // Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function login($email, $password){

            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);
            


            $row = $this->db->single();
            

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            }else{
                return false;
            }
        }

        //find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Ckeck row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

    }