<?php

namespace App\Controller\Admin;

use Core\Controller\Controller;

use  App\Controller\AppController;

use \App; 

class CategoriesController extends AppController{

    public function __construct(){

        parent::__construct();
        
        $this->loadModel('GrandeCategories');

    }
    
    
    public function index(){

        // Get posts
        $GrandeCategories = $this->GrandeCategories->getGrandeCategories();

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $this->render('admin.grande_categories.index', compact('GrandeCategories'));
    }

    public function add(){

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $GrandeCategories = $this->GrandeCategories->getGrandeCategories();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $nomfile = $_FILES['file']['name'];

            move_uploaded_file($_FILES['file']['tmp_name'], URLBASE.'/public/img/'.$nomfile);

            $slug = str_replace(" ", "_", $_POST['titre']);

            $data =[
                'type' => trim($_POST['type']),
                'couleur_type' => trim($_POST['couleur_type']),
                'titre' => trim($_POST['titre']),
                'image' => trim($_FILES['file']['name']),
                'id' => $id
            ];
            
                // Validated
                if($this->GrandeCategories->addGrandeCategories($data)){
                    redirect('admin/grande_categories/index/'.$id); 
                }else{
                    die('Something went wrong');
                }

        }else{

            

            
            $type = '';
            $couleur_type = '';
            $titre = '';
            $image = '';
            $id = '';
           

            $this->render('admin.grande_categories.add', compact('type', 'couleur_type', 'titre', 'image', 'id'));
              
        }
        
    }

    public function edit($id){


        $GrandeCategories = $this->GrandeCategories->getGrandeCategories();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $slug = str_replace(" ", "_", $_POST['nom']);

            $data =[
                'nom' => trim($_POST['nom']),
                'slug' => $slug,
                'id' => $id
            ];

            // Make sure no errors
            
                // Validated
                if($this->GrandeCategories->updateGrandeCategories($data)){
                    redirect('admin/grande_categories/show/'.$slug); 
                }else{
                    die('Something went wrong');
                }

        }else{

            $GrandeCategories = $this->GrandeCategories->getGrandeCategoriesById($id);

            // verifier($_SESSION['user_id']); 


            if(empty($_SESSION['user_id'])){
                redirect('users/login');
            }

            

            if($article->user_id != $_SESSION['user_id']){
                redirect('users/login');
            }

            
            $this->render('admin.grande_categories.edit', compact('GrandeCategories')); 
        }
        
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Get existing post from model
            $article = $this->GrandeCategories->getGrandeCategoriesById($id);
            if(empty($_SESSION['user_id'])){
                redirect('users/login');
            }
            
            if($post->user_id != $_SESSION['user_id']){
                redirect('users/login');
            }

            if($this->GrandeCategories->deleteGrandeCategories($id)){
                redirect('admin/grande_categories/index/'.$user_id);
            }else{
                die('Something went wrong');
            }
        }else{
            redirect('admin/grande_categories/index/'.$_SESSION['user_id']);
        }
    }

}