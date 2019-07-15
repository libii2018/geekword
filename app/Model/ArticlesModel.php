<?php

namespace App\Model;

use Core\Model\Model;

class ArticlesModel extends Model {

    /**
     * recupere les dernies articles
     * @return array
     */


    public function getArticles(){

        $this->db->query("SELECT * FROM articles");

        return $this->db->resultSet();

    }

    public function getArticlesByIdWithCategories($user_id){

        $this->db->query("SELECT *,     
                          articles.id,
                          articles.titre,
                          articles.contenu,
                          articles.date_de_creation,
                          articles.slug,
                          articles.user_id as user_id,
                          categories.id as idCategories,
                          categories.nom as nomCategories
                          FROM  articles
                          LEFT JOIN categories
                          ON articles.categorie_id = categories.id
                          WHERE user_id = :user_id
                          ");

        $this->db->bind(':user_id', $user_id);

        $row = $this->db->resultSet();

        return $row;
    }

    public function getArticlesByIdSlug($slug){

        $this->db->query("SELECT *,     
                          articles.id,
                          articles.titre,
                          articles.contenu,
                          articles.date_de_creation,
                          articles.slug,
                          categories.id as idCategories,
                          categories.nom as nomCategories
                          FROM  articles
                          LEFT JOIN categories
                          ON articles.categorie_id = categories.id
                          WHERE slug = :slug
                          ");
        

        
        $this->db->bind(':slug', $slug);

        return $this->db->resultSet();
    }

    public function getarticlesById($id){

        $this->db->query('SELECT * FROM articles WHERE id = :id');
        
        $this->db->bind(':id', $id);

        return $this->db->resultSet();
    }
    
    public function addArticle($data){

        $this->db->query('INSERT INTO articles (titre, contenu, image, slug, description, categorie_id, user_id) VALUES(:titre,  :contenu, :image, :slug, :description, :categorie, :user_id)');
        // Bind values 
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':contenu', $data['contenu']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':categorie', $data['categorie']);

        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getArticleById($id){
        $this->db->query('SELECT * FROM articles WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getArticleByUser_Id($user_id){
        $this->db->query('SELECT * FROM articles WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);

        $row = $this->db->resultSet();

        return $row;
    }

    public function updateArticle($data){
        $this->db->query('UPDATE articles SET titre = :titre, contenu = :contenu, image = :image, slug = :slug, description = :description, categorie_id =:categorie WHERE id = :id');
        // Bind values 
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':contenu', $data['contenu']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':categorie', $data['categorie']);

        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteArticle($id){
        $this->db->query('DELETE FROM articles WHERE id = :id');
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