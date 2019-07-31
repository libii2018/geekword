<?php

namespace App\Controller;

use Core\Controller\Controller;

use \App; 

class UsersController extends AppController{

    public function __construct(){

        parent::__construct();
        $this->loadModel('users');
        $this->loadModel('articles');
        $this->loadModel('mangas');
        $this->loadModel('categories');
    }

    public function index($user_id){

        // Get posts  
        $mangas = $this->mangas->getMangasByIdWithCategories($user_id);  

        // verifier($mangas);



        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $this->render('users.index', compact('mangas'));

    }

    public function article($user_id){

        // Get posts
        $articles = $this->articles->getArticlesByIdWithCategories($user_id);  

        // verifier($articles);



        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $this->render('users.article', compact('articles'));

    }

    public function add(){

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $categories = $this->categories->getCategories();

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
                    redirect('users/show/'.$slug); 
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
           

            $this->render('users.add', compact('title', 'contenu', 'user_id', 'image', 'slug', 'desciption', 'categorie', 'auteur', 'categories'));
              
        }
        
    }

    public function edit($id){


        $categories = $this->categories->getCategories();

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
                    redirect('users/show/'.$slug); 
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

            
            $this->render('users.edit', compact('article', 'categories')); 
        }
        
    }


    public function register(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =[
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'img' =>  $this->addImage($_FILES),
                'admin' => $admin = 0,
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else{
                // Check email
                if($this->users->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email iis already taken';
                }
            }

            // Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            // validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Please must be at least 6 characters';
            }

            // validate Confirm Password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please enter password';
            }else{
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }



           
            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Validation
                
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if($this->users->register($data)){
                    redirect('users/login');
                }else{
                    die('Someting went wrong');
                }
            }else{
                // Load view with errors
                $this->render('users.register', compact('data')); 
            }

        }else{
            // Init data

                $data =[
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
            

            // Load view
            $this->render('users.register', compact('data'));
        }

        
    }

    public function login(){
        // Check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data

            //Init data
            $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }

            // validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if($this->users->findUserByEmail($data['email'])){
                // User found
            }else{
                // User not found
                $data['email_err'] = 'No user found';
            }


            // Make sure errors are empty
            if(empty($data['email_err']) &&  empty($data['password_err'])){
                // Validation
                // Check and set logget in user
                $loggedInUser = $this->users->login($data['email'], $data['password']);

               
                
                if($loggedInUser){
                    //Create Session
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = 'Password incorrect';
                    $this->render('users.login', compact('data'));
                }
            }else{
                // Load view with errors
                $this->render('users.login', compact('data'));  
            }

        } else{
            // Init data
            
            $data =[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            

            // Load view
            $this->render('users.login', compact('data'));
        }
    }

    public function createUserSession($user){
        
        
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_img'] = $user->img;

        if($user->admin == 1){

            redirect('admin/articles/index');

        }else{

            redirect('users/index/'.$_SESSION['user_id']);

        }

        

    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_img']);
        session_destroy();
        redirect('pages/index/mangas');
    }

    public function delete($id){

        // verifier($id);

        $this->users->deleteUsers($id);

        redirect('/users/index/'.$_SESSION['user_id']); 

    }

}