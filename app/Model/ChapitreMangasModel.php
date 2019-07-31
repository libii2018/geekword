<?php

namespace App\Model;

use Core\Model\Model;

class ChapitreMangasModel extends Model{


    public function getChapitre(){

        $this->query("SELECT * FROM chapitre_mangas");

        $row = $this->db->resultSet();

        return $row;

    }

    public function orderChapitre(){ 

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
                        users.id,
                        users.name as nomAuteur,
                        categories.id as categoriesId,
                        categories.nom as nomCategories
                        FROM chapitre_mangas
                        INNER JOIN mangas
                        ON chapitre_mangas.id = mangas.id
                        INNER JOIN categories
                        ON categories.id = mangas.id_categorie  
                        INNER JOIN users
                        ON users.id = mangas.id_user 
                        ORDER BY date_de_creation DESC                                                                  
                        ");

        $row = $this->db->resultSet();

        return $row;

    }

    public function getChapitreByCategories($slug){

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
                        users.id,
                        users.name as nomAuteur,
                        grandes_categories.id as categoriesId,
                        grandes_categories.nom as nomCategories,
                        grandes_categories.slug as slugCategories
                        FROM chapitre_mangas
                        INNER JOIN mangas
                        ON chapitre_mangas.id = mangas.id
                        INNER JOIN grandes_categories
                        ON grandes_categories.id = mangas.id_categorie  
                        INNER JOIN users
                        ON users.id = mangas.id_user 
                        WHERE grandes_categories.slug = :slug                                                                  
                        ");

        $this->db->bind(':slug', $slug);

        $row = $this->db->resultSet();

        return $row;

    }

    public function getChapitreByIdWithCategories($id_mangas){

        $this->db->query("SELECT *,
                        chapitre_mangas.id as chapitreId,
                        chapitre_mangas.numero_de_chapitre as chapitreNumero,
                        chapitre_mangas.titre as chapitreTitre,
                        chapitre_mangas.description as chapitreDescription,
                        chapitre_mangas.img as chapitreImg,
                        chapitre_mangas.slug as chapitreSlug,
                        chapitre_mangas.vue as chapitreVue,
                        chapitre_mangas.date_de_creation as chapitreDate,
                        chapitre_mangas.id_mangas,
                        mangas.id,
                        mangas.id_user,
                        mangas.id_categorie as mangasIdCategorie,
                        grandes_categories.id,
                        grandes_categories.nom as grandesCategorieNom,
                        users.id,
                        users.name as userNom,
                        users.img as userImg
                        FROM chapitre_mangas
                        INNER JOIN mangas
                        ON chapitre_mangas.id_mangas = mangas.id
                        INNER JOIN grandes_categories
                        ON mangas.id_categorie = grandes_categories.id
                        INNER JOIN users
                        ON mangas.id_user = users.id
                        WHERE chapitre_mangas.id_mangas = :id_mangas                                                                   
                        ");  

        $this->db->bind(':id_mangas', $id_mangas);
    
        $row = $this->db->single();

        return $row;

    }

    public function getChapitreByIdWithCategoriesMulti($id_mangas){

        $this->db->query("SELECT *,
                        chapitre_mangas.id as chapitreId,
                        chapitre_mangas.id_mangas as chapitreId,
                        chapitre_mangas.titre as chapitreTitre,
                        chapitre_mangas.description as chapitreDescription,
                        mangas.id as mangasId,
                        mangas.titre as mangasTitre,
                        mangas.img as mangasImg,
                        mangas.id_user,
                        mangas.id_categorie,
                        grandes_categories.id as categoriesId,
                        grandes_categories.nom as nomCategories,
                        users.id,
                        users.name as usersNom
                        FROM chapitre_mangas
                        INNER JOIN mangas
                        ON chapitre_mangas.id = mangas.id
                        INNER JOIN users
                        ON mangas.id_user = users.id
                        INNER JOIN grandes_categories
                        ON grandes_categories.id = mangas.id_categorie  
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

    public function getChapitreByIdMangas($id_mangas){

        $this->query('SELECT * FROM chapitre_mangas WHERE id_mangas = :id_mangas');

        $this->db->bind(':id_mangas', $id_mangas);

        return $this->db->resultSet();

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

    public function updateChapitre($data,$id){

        $this->query('UPDATE chapitre_mangas SET titre = :titre, description = :description, img = :img, slug = :slug, id_mangas = :id_mangas WHERE id = :id');

        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':id_mangas', $data['id_mangas']);
        $this->db->bind(':id', $id);

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