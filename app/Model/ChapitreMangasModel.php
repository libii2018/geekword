<?php

namespace App\Model;

use Core\Model\Model;

class ChapitreMangasModel extends Model{


    public function getChapitre(){

        $this->query("SELECT * FROM chapitre_mangas");

        $row = $this->db->resultSet();

        return $row;

    }

    public function getChapitreByIdWithCategories($id_mangas){

        // verifier($id_mangas);

        $this->db->query("SELECT *,
                        chapitre_mangas.id as chapitreId,
                        chapitre_mangas.id_mangas as chapitreMangasId,
                        chapitre_mangas.titre as chapitreTitre,
                        chapitre_mangas.description as chapitreDescription,
                        chapitre_mangas.img as chapitreImg,
                        mangas.id as mangasId,
                        mangas.titre as mangasTitre,
                        mangas.id_user,
                        mangas.id_categorie,
                        categories.id as categoriesId,
                        categories.nom as nomCategories
                        FROM chapitre_mangas
                        INNER JOIN mangas
                        ON chapitre_mangas.id = mangas.id
                        INNER JOIN categories
                        ON categories.id = mangas.id_categorie  
                        WHERE chapitre_mangas.id_mangas = :id_mangas                                                                   
                        ");

        $this->db->bind(':id_mangas', $id_mangas);
    
        $row = $this->db->resultSet();

        return $row;

    }

    public function getChapitreById($id){

        $this->query('SELECT * FROM chapitre_mangas WHERE id = :id');

        $this->db->bind(':id', $id);

        return $this->db->single();

    }

    public function addChapitre($data){

        $this->query('INSERT INTO chapitre_mangas (titre, description, img, slug, id_mangas) values(:titre, :description, :img, :slug, :id_mangas)');

        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':id_mangas', $data['id_mangas']);

        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function updateChapitre($data){

        $this->query('UPDATE chapitre_mangas SET titre = :titre, description = :description, img = :img, slug = :slug, id_mangas = :id_mangas');

        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':id_mangas', $data['id_mangas']);

        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function deleteChapitre($id){

        $this->db->query('DELETE FROM chapitre_mangas WHERE id = :id');
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