<?php

namespace App\Controller\Admin;

use Core\Controller\Controller;

use  App\Controller\AppController;

use \App; 

class GestionUsersController extends AppController{

    public function __construct(){

        parent::__construct();

        $this->loadModel('users');

    }


    public function index(){

        // Get posts
        $users = $this->users->getUsers();

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $this->render('admin.users.index', compact('users'));
    }

    public function add(){

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $users = $this->users->getUsers();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =[
                'name'=> trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'id' => $id
            ];
            
                // Validated
                if($this->users->addgetUsers($data)){
                    redirect('admin/grande_categories/index/'.$id); 
                }else{
                    die('Something went wrong');
                }

        }else{

            

            
            $name = '';
            $email = '';
            $titre = '';
            $password = '';
            $id = '';
           

            $this->render('admin.users.add', compact('name', 'email', 'password', 'id'));
              
        }
        
    }

    public function edit($id){


        $users = $this->users->getUsers();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            

            $data =[
                'name'=> trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'id' => $id
            ];

            // Make sure no errors
            
                // Validated
                if($this->GrandeCategories->updategetUsers($data)){
                    redirect('admin/users/show/'.$slug); 
                }else{
                    die('Something went wrong');
                }

        }else{

            $users = $this->GrandeCategories->getUsersById($id);

            // verifier($_SESSION['user_id']); 


            if(empty($_SESSION['user_id'])){
                redirect('users/login');
            }

            

            if($article->user_id != $_SESSION['user_id']){
                redirect('users/login');
            }

            
            $this->render('admin.users.edit', compact('users')); 
        }
        
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Get existing post from model
            $article = $this->users->getUsersById($id);

            if(empty($_SESSION['user_id'])){
                redirect('users/login');
            }
            
            if($post->user_id != $_SESSION['user_id']){
                redirect('users/login');
            }

            if($this->users->deleteUsers($id)){
                redirect('admin/users/index/'.$user_id);
            }else{
                die('Something went wrong');
            }
        }else{
            redirect('admin/users/index/'.$_SESSION['user_id']);
        }
    }

}