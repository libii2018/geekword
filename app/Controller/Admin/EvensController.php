<?php

namespace App\Controller\Admin;

use Core\Controller\Controller;

use  App\Controller\AppController;

use \App; 

class EvensController extends AppController{

    public function __construct(){

        parent::__construct();
        
        $this->loadModel('evenements');

    }

    
    public function index(){

        // Get posts
        $evenements = $this->evenements->getEvenements();

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }
         //echo '<pre>';
         //var_dump($users);
         //echo '</pre>';
         //die();

        $this->render('admin.evenements.index', compact('evenements'));
    }

    public function add(){

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $evenements = $this->evenements->getEvenements();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $nomfile = $_FILES['file']['name'];

            move_uploaded_file($_FILES['file']['tmp_name'], URLBASE.'/public/img/'.$nomfile);

            $data =[
                'type' => trim($_POST['type']),
                'couleur_type' => trim($_POST['couleur_type']),
                'titre' => trim($_POST['titre']),
                'image' => trim($_FILES['file']['name']),
                'id' => $id

            ];
            
                // Validated
                if($this->evenements->addEvenements($data)){
                    redirect('admin/evenements/index/'.$id); 
                }else{
                    die('Something went wrong');
                }

        }else{

            

            
            $type = '';
            $couleur_type = '';
            $titre = '';
           

            $this->render('admin.evenements.add', compact('type', 'couleur_type','titre'));
              
        }
        
    }

    
    public function edit($id){


        $evenements = $this->evenements->getEvenements();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $nomfile = $_FILES['file']['name'];

            move_uploaded_file($_FILES['file']['tmp_name'], URLBASE.'/public/img/'.$nomfile);

            $data =[
                'type' => trim($_POST['type']),
                'couleur_type' => trim($_POST['couleur_type']),
                'titre' => trim($_POST['titre']),
                'image' => trim($_FILES['file']['name']),
                'id' => $id
            ];

            // Make sure no errors
            
                // Validated
                if($this->evenements->updateEvenements($data)){
                    redirect('admin/evenements/show/'.$slug); 
                }else{
                    die('Something went wrong');
                }

        }else{

            $evenements = $this->evenements->getEvenementsById($id);

            // verifier($_SESSION['user_id']); 


            if(empty($_SESSION['user_id'])){
                redirect('users/login');
            }

            

            if($article->user_id != $_SESSION['user_id']){
                redirect('users/login');
            }

            
            $this->render('admin.evenements.edit', compact('evenements')); 
        }
        
    }


    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Get existing post from model
            $article = $this->evenements->getEvenementsById($id);

            if(empty($_SESSION['user_id'])){
                redirect('users/login');
            }
            
            if($post->user_id != $_SESSION['user_id']){
                redirect('users/login');
            }

            if($this->evenements->deleteEvenements($id)){
                redirect('admin/evenements/index/'.$user_id);
            }else{
                die('Something went wrong');
            }
        }else{
            redirect('admin/evenements/index/'.$_SESSION['user_id']);
        }
    }


}