<?php 

namespace App\Controller;

use Core\Controller\Controller;

use \App;


class MangasController extends AppController{

    public function __construct(){

        parent::__construct();

        $this->loadModel('mangas');
        $this->loadModel('categories');

    }

    public function add(){

        $categories = $this->categories->getCategories();

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $slug = str_replace(" ", "_", $_POST['titre']);


            $data = [
                'titre' => trim($_POST['titre']),
                'description' => trim($_POST['description']),
                'id_categorie' => trim($_POST['categorie']),
                'id_user' => $_SESSION['user_id'],
                'slug' => $slug,
                'img' =>  $this->addImage($_FILES)
            ];


            // Validated
            if($this->mangas->addMangas($data)){
                redirect('/users/index/'.$_SESSION['user_id']); 
            }else{
                die('Something went wrong');
            }

        }else{
            
            $this->render('users.mangas..add', compact('categories'));

        }

    }

    public function edit($id){

        $categories = $this->categories->getCategories();

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $slug = str_replace(" ", "_", $_POST['titre']);

            $data = [
                'titre' => trim($_POST['titre']),
                'description' => trim($_POST['description']),
                'id_categorie' => trim($_POST['categorie']),
                'slug' => $slug,
                'img' =>  $this->addImage($_FILES)
            ];

            // Validated
            if($this->mangas->updateMangas($data)){
                redirect('/users/index/'.$_SESSION['user_id']);  
            }else{
                die('Something went wrong');
            }

        }else{

            $mangas = $this->mangas->getMangasById($id);
            
            $this->render('users.mangas.edit', compact('categories','mangas'));

        }

    }

    public function delete($id){

        $this->mangas->deleteMangas($id);

        redirect('/users/index/'.$_SESSION['user_id']); 

    }

}