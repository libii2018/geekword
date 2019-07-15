<?php

namespace App\Controller;

use Core\Controller\Controller;

use \App; 

class PagesController extends AppController{

    public function __construct(){

        parent::__construct();
        $this->loadModel('articles');
        $this->loadModel('categories');
        $this->loadModel('evenements');
    }

    public function index($slug){

        $id = $this->categories->getCategoriesByIdSlug($slug)[0]->id;
        $articles = $this->articles->getArticles();
        // $categories = $this->categories->getCategories($id);
        $categories = $this->categories->getCategoriesById($id);
        // $categories = $this->categories->getGrandeCategories($id);
        $evenements= $this->evenements->getevenements();
        $GrandeCategories = $this->categories->getGrandeCategories();

        foreach($categories as $categorie){

            $categorie->items = [];
    
            foreach($articles as $article){
                
                if($article->categorie_id == $categorie->id){

                    array_push($categorie->items,$article);

                }

            }
        }


        // var_dump($articles);
        // die();

        $this->render('Pages.index', compact('articles', 'categories', 'evenements', 'GrandeCategories', 'id')); 
    }

    public function article($slug){
        $id = $this->articles->getArticlesByIdSlug($slug)[0]->id;
        $articles = $this->articles->getArticlesByIdSlug($slug);
        $GrandeCategories = $this->categories->getGrandeCategories();

        // var_dump($articles);
        // die();

        $this->render('Pages.articles', compact('articles','GrandeCategories', 'id')); 

    }
    
}