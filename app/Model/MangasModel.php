<?php

namespace App\Model;

use Core\Model\Model;

class MangasModel extends Model{

    public function getMangasByIdWithCategories($user_id){

        $this->db->query("SELECT *,
                        mangas.id as mangasId,
                        mangas.id_user as userMangas,
                        mangas.titre as mangasTitre,
                        mangas.description as mangasDescription,
                        mangas.id_categorie as iDcategorieMangas,
                        mangas.img as mangasImage,
                        users.id as usersId,
                        users.name as usersName,
                        categories.id as categoriesId,
                        categories.nom as nomCategories
                        FROM mangas
                        INNER JOIN users
                        ON mangas.id_user = users.id
                        INNER JOIN categories
                        ON categories.id = mangas.id_categorie   
                        WHERE mangas.id_user = :user_id                                                                   
                        ");

        $this->db->bind(':user_id', $user_id);
    
        $row = $this->db->resultSet();

        return $row;

    }

    public function getMangasByCategories($slug){

        $this->db->query("SELECT *,
                        mangas.id as mangasId,
                        mangas.id_user as userMangas,
                        mangas.titre as mangasTitre,
                        mangas.description as mangasDescription,
                        mangas.id_categorie as iDcategorieMangas,
                        mangas.img as mangasImage,
                        users.id as usersId,
                        users.name as usersName,
                        grandes_categories.id as categoriesId,
                        grandes_categories.nom as nomCategories,
                        grandes_categories.slug as slugCategories
                        FROM mangas
                        INNER JOIN users
                        ON mangas.id_user = users.id
                        INNER JOIN grandes_categories
                        ON grandes_categories.id = mangas.id_categorie   
                        WHERE grandes_categories.slug = :slug                                                                   
                        ");

        $this->db->bind(':slug', $slug);
    
        $row = $this->db->resultSet();

        return $row;

    }

    public function getMangasByIdUsers($id){

        $this->db->query("SELECT *,
                        mangas.id as mangasId,
                        mangas.id_user as userMangas,
                        mangas.titre as mangasTitre,
                        mangas.description as mangasDescription,
                        mangas.id_categorie as iDcategorieMangas,
                        mangas.img as mangasImage,
                        users.id as usersId,
                        users.name as usersName,
                        categories.id as categoriesId,
                        categories.nom as nomCategories
                        FROM mangas
                        INNER JOIN users
                        ON mangas.id_user = users.id
                        INNER JOIN categories
                        ON categories.id = mangas.id_categorie   
                        WHERE mangas.id = :id                                                                   
                        ");

        $this->db->bind(':id', $id);
    
        $row = $this->db->resultSet();

        return $row;

    }

    public function getMangasById($id){

        $this->query('SELECT * FROM mangas WHERE id = :id');

        $this->db->bind(':id', $id);

        return $this->db->single();

    }

    public function addMangas($data){



        $this->query('INSERT INTO mangas 
                    (
                        id_user, 
                        titre, 
                        description, 
                        id_categorie, 
                        img, 
                        slug
                    ) 
                    values
                    (
                        :id_user, 
                        :titre, 
                        :description, 
                        :id_categorie, 
                        :img, 
                        :slug
                    )');

        $this->db->bind(':id_user', $data['id_user']);
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':id_categorie', $data['id_categorie']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':slug', $data['slug']);

        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function updateMangas($data,$id){

        $this->query('UPDATE mangas SET titre = :titre, description = :description, id_categorie = :id_categorie, img = :img, slug = :slug WHERE id = :id');

        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':id_categorie', $data['id_categorie']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function deleteMangas($id){

        $this->db->query('DELETE FROM mangas WHERE id = :id');
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