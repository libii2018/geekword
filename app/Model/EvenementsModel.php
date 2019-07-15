<?php

    namespace App\Model;

    use Core\Model\Model;

    class EvenementsModel extends Model {

        public function getEvenements(){
            $this->db->query("SELECT * FROM evenement");

            return $this->db->resultSet();

        }


        public function updateGrandeCategories($data){
            $this->db->query('UPDATE evenement SET type = :type, couleur_type = :couleur_type, image = :image WHERE id = :id');
            // Bind values 
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':couleur_type', $data['couleur_type']);
            $this->db->bind(':id', $data['id']);
    
            // Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getEvenementsById($id){

            $this->db->query("SELECT * FROM evenement WHERE id = :id");

            return $this->db->resultSet();
        
        }

        public function addEvenements($data){

            $this->db->query('INSERT INTO evenement (type, couleur_type, titre, image) VALUES(:type,  :couleur_type, :titre, :image)');
            // Bind values 
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':couleur_type', $data['couleur_type']);
            $this->db->bind(':titre', $data['titre']);
            $this->db->bind(':image', $data['image']);
    
            // Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteEvenements($id){
            $this->db->query('DELETE FROM evenement WHERE id = :id');
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