<?php

namespace App\Controller\Admin;

use Core\Controller\Controller;

use  App\Controller\AppController;

use \App; 

class ArticlesController extends AppController{

    public function __construct(){

        parent::__construct();
        
        $this->loadModel('articles');
        $this->loadModel('categories');
        $this->loadModel('GrandeCategories');

    }

    public function index(){

        // Get posts
        $articles = $this->articles->getArticlesByIdWithCategories( $_SESSION['user_id']);

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $this->render('admin.articles.index', compact('articles'));
    }

    public function show($slug){
        // Get posts
        $GrandeCategories = $this->categories->getGrandeCategories();
        $articles = $this->articles->getArticlesByIdSlug($slug);


        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        if($articles[0]->user_id != $_SESSION['user_id']){
            redirect('users/login');
        }

        $this->render('admin.articles.show', compact('articles', 'GrandeCategories'));
    }

    public function add(){

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $categories = $this->GrandeCategories->getGrandeCategories();
        // $categories = $this->categories->getCategories();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $slug = str_replace(" ", "_", $_POST['titre']);

            $data =[
                'titre' => trim($_POST['titre']),
                'contenu' => trim($_POST['contenu']),
                'user_id' => $_SESSION['user_id'],
                'image' =>  $this->addImage($_FILES),
                'slug' => $slug,
                'description' => trim($_POST['description']),
                'categorie' => trim($_POST['categorie']),
                //'auteur' => trim($_POST['auteur']),
                'categories' =>  $categories

            ];
            
                // Validated
                if($this->articles->addArticle($data)){
                    redirect('admin/articles/show/'.$slug); 
                }else{
                    die('Something went wrong');
                }

        }else{

            

            
            $title = '';
            $contenu = '';
            $user_id = $_SESSION['user_id'];
            $image = '';
            $slug = '';
            $desciption = '';
            $categorie = '';
            $auteur = '';
            $categories =  $categories;
           

            $this->render('admin.articles.add', compact('title', 'contenu', 'user_id', 'image', 'slug', 'desciption', 'categorie', 'auteur', 'categories'));
              
        }
        
    }

    public function edit($id){


        $categories = $this->GrandeCategories->getGrandeCategories();
        // $categories = $this->categories->getCategories();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $slug = str_replace(" ", "_", $_POST['titre']);

            $data =[
                'titre' => trim($_POST['titre']),
                'contenu' => trim($_POST['contenu']),
                'id' => $id,
                'image' =>  $this->addImage($_FILES),
                'slug' => $slug,
                'description' => trim($_POST['description']),
                'categorie' => trim($_POST['categorie']),
                //'auteur' => trim($_POST['auteur']),
                'categories' =>  $categories

            ];

            // Make sure no errors
            
                // Validated
                if($this->articles->updateArticle($data)){
                    redirect('articles/show/'.$slug); 
                }else{
                    die('Something went wrong');
                }

        }else{

            $article = $this->articles->getArticleById($id);

            // verifier($_SESSION['user_id']); 


            if(empty($_SESSION['user_id'])){
                redirect('users/login');
            }

            

            if($article->user_id != $_SESSION['user_id']){
                redirect('users/login');
            }

            
            $this->render('.articles.edit', compact('article', 'categories')); 
        }
        
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Get existing post from model
            $article = $this->articles->getArticleById($id);
            $user_id = $article->user_id;

            if(empty($_SESSION['user_id'])){
                redirect('users/login');
            }
            
            if($article->user_id != $_SESSION['user_id']){
                redirect('users/login');
            }

            if($this->articles->deleteArticle($id)){
                redirect('admin/articles/index/'.$user_id);
            }else{
                die('Something went wrong');
            }
        }else{
            redirect('admin/articles/index/'.$user_id);
        }
    }

}