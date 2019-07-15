<?php

    namespace App\Model;

    use Core\Model\Model;

    class CategoriesModel extends Model {

        public function getCategories(){

            $this->db->query("SELECT * FROM categories");

            return $this->db->resultSet();
        }

        public function getCategoriesById($id){

            $this->db->query("SELECT * FROM categories WHERE id_grandes_categories = :id");

            $this->db->bind(':id', $id);

            return $this->db->resultSet();
        }

        public function getCategoriesByIdSlug($slug){

            $this->db->query("SELECT id FROM grandes_categories WHERE slug = :slug");

            $this->db->bind(':slug', $slug);

            return $this->db->resultSet();
        }

        public function getGrandeCategories(){
            
            $this->db->query("SELECT * FROM grandes_categories");

            return $this->db->resultSet();
        }

        public function getCategoriesByArticles(){

            $this->db->query("SELECT *,
                              articles.id as articlesId,
                              articles.titre as articlesTitle,
                              articles.contenu as articlesContenu,
                              articles.date_de_creation as articlesCreated_at,
                              categories.id as categorieId,
                              categories.nom as categorieName
                              FROM  categories
                              LEFT JOIN articles
                              ON articles.categorie_id = categories.id
                              GROUP BY categorieId
                              ORDER BY articlesCreated_at DESC
                              ");

            $row = $this->db->resultSet();

            return $row;
        }

    }