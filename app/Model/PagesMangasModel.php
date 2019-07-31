<?php

namespace App\Model;

use Core\Model\Model;

class PagesMangasModel extends model{

    public function getPages(){

        $this->query("SELECT * FROM pages_mangas");

        $row = $this->db->resultSet();

        return $row;

    }

    public function getPageIdChapitre($id_chapitre,$numero_de_page){

        $this->query("SELECT * FROM pages_mangas WHERE numero_de_page = :numero_de_page AND id_chapitre = :id_chapitre");

        $this->db->bind(':id_chapitre', $id_chapitre);
        $this->db->bind(':numero_de_page', $numero_de_page);

        return $this->db->single();

    }

    public function getPagesByChapitre($id_chapitre){

        $this->query("SELECT *,
                    pages_mangas.id as pagesId,
                    pages_mangas.id_chapitre as pagesId_chapitre,
                    pages_mangas.img as pagesImg,
                    chapitre_mangas.id as chapitreId,
                    chapitre_mangas.titre as chapitreTitre,
                    mangas.id as mangasId,
                    mangas.titre as mangasTitre,
                    mangas.id_categorie as mangasId_categorie,
                    categories.id as categoriesId,
                    categories.nom as categoriesNom
                    FROM pages_mangas
                    INNER JOIN chapitre_mangas
                    ON pages_mangas.id_chapitre = chapitre_mangas.id
                    INNER JOIN mangas
                    ON chapitre_mangas.id = mangas.id
                    INNER JOIN categories
                    ON mangas.id_categorie = categories.id
                    WHERE pages_mangas.id_chapitre = :id_chapitre
                    ");

        $this->db->bind(':id_chapitre', $id_chapitre);
            
        $row = $this->db->resultSet();

        return $row;    

    }

    public function getPagesId($id_chapitre){

        $this->query("SELECT * FROM pages_mangas WHERE id_chapitre = :id_chapitre");

        $this->db->bind(':id_chapitre', $id_chapitre);
            
        $row = $this->db->resultSet();

        return $row;


    }

    public function addPages($data){

        $this->query("INSERT INTO pages_mangas
                    (
                        id_chapitre, 
                        img,
                        numero_de_page
                    ) 
                    values
                    (
                        :id_chapitre, 
                        :img,
                        :numero_de_page
                    )
                    ");

        $this->db->bind(':id_chapitre', $data['id_chapitre']);
        $this->db->bind(':img', $data['img']);
        $this->db->bind(':numero_de_page', $data['numero_de_page']);

        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function updatePages($d){



    }

    public function deletePages($id){



    }

}