<?php

namespace App\Controller;

use App\Controller\AppController;

use \App;

class PagesMangasController extends AppController{

    public function __construct()
    {
        parent::__construct();

        $this->loadModel('PagesMangas');
    }

    public function index($id_chapitre){

        $pages = $this->PagesMangas->getPagesId($id_chapitre);

        // verifier($pages);

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        $this->render('users.mangas.pages.index', compact('pages','id_chapitre'));

    }

    public function add($id_chapitre){

        if(empty($_SESSION['user_id'])){
            redirect('users/login');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Count total files
            $countfiles = count($_FILES['file']['name']);

            $numero_de_page = 0;

            //looping all files
            for($i = 0; $i < $countfiles; $i++){
                
                $filename = $_FILES['file']['name'][$i];

                // verifier($filename);

                //upload file
                move_uploaded_file($_FILES['file']['tmp_name'][$i],URLBASE.'/public/img/pages_mangas/'.$filename);

                $data = [
                    'id_chapitre' => $id_chapitre,
                    'img' =>  $filename,
                    'numero_de_page' => $i
                ];
    
                $this->PagesMangas->addPages($data);
                

            }

            redirect('pagesMangas/index/'.$id_chapitre);

        }else{

            $this->render('users.mangas.pages.add',compact('id_chapitre'));

        }

    }

    public function delete(){


    }

}