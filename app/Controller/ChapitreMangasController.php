<?php

namespace App\Controller;

use Core\Controller\Controller;

use \App;

class ChapitreMangasController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('chapitreMangas');
        $this->loadModel('categories');
        $this->loadModel('mangas');

    }

    public function index($id_mangas){

        // Get posts
        $chapitres = $this->chapitreMangas->getChapitreByIdMangas($id_mangas);

        // verifier($chapitres); 

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }


        $this->render('users.mangas.chapitre.index', compact('chapitres','id_mangas'));

    }

    public function add($id_mangas){


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
                'id_mangas' => $id_mangas,
                'slug' => $slug,
                'img' =>  $this->addImage($_FILES)
            ];


            // Validated
            if($this->chapitreMangas->addChapitre($data)){
                redirect('chapitreMangas/index/'.$id_mangas); 
            }else{
                die('Something went wrong');
            }

        }else{
            
            $this->render('users.mangas.chapitre.add', compact('categories','id_mangas'));

        }

    }

    public function edit($id){

        $mangas = $this->mangas->getMangasById($id);

        $categories = $this->categories->getCategories();

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $slug = str_replace(" ", "_", $_POST['titre']);

            if($this->addImage($_FILES) === ''){
                $img = $mangas->img;
            }else{
                $img = $this->addImage($_FILES);
            }

            $data = [
                'titre' => trim($_POST['titre']),
                'description' => trim($_POST['description']),
                'slug' => $slug,
                'id_mangas' => $id,
                'img' =>  $img
            ];

            // Validated
            if($this->chapitreMangas->updateChapitre($data,$id)){
                // redirect(); 
            }else{
                die('Something went wrong');
            }

        }else{

            $chapitres = $this->chapitreMangas->getChapitreById($id);
            
            $this->render('users.mangas.chapitre.edit', compact('categories','chapitres'));

        }

    }

    public function delete($id){

        $this->chapitreMangas->deleteChapitre($id);

        redirect('users/mangas/chapitre/index/'.$id);

    }

    

}