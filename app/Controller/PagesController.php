<?php

namespace App\Controller;

use Core\Controller\Controller;

use \App; 

class PagesController extends AppController{

    public function __construct(){

        parent::__construct();
        $this->loadModel('ChapitreMangas');
        $this->loadModel('articles');
        $this->loadModel('mangas');
        $this->loadModel('PagesMangas');
    }

    public function index(){

        $mangas = $this->mangas->getMangasByCategories('Mangas');
        $Comic = $this->mangas->getMangasByCategories('Comic');
        $BD = $this->mangas->getMangasByCategories('BD');
        $Ligth_Novel = $this->mangas->getMangasByCategories('Ligth Novel');
        $articles = $this->articles->getArticles();

        // verifier($mangas);

        $this->render('Pages.index', compact('mangas','Comic','BD','Ligth_Novel','articles')); 
    }

    public function mangas(){

        $chapitre = $this->mangas->getMangasByCategories('Mangas');

        // verifier($chapitre);

        $this->render('Pages.mangas', compact('chapitre')); 
    }

    public function article($id){

        $articles = $this->articles->getarticlesById($id);

        $this->render('Pages.article', compact('articles')); 
    }

    public function chapitre($id_mangas){

        $Mangas = $this->ChapitreMangas->getChapitreByIdWithCategories($id_mangas);
        $toutChapitreMangas = $this->ChapitreMangas->getChapitreByIdMangas($id_mangas);

        // verifier($toutChapitreMangas); 
        // verifier($Mangas); 

        $this->render('Pages.chapitre', compact('Mangas','toutChapitreMangas')); 
    }
    
    public function pages($id_chapitre, $numero_de_page = null){

        // $page = 0;


        if($numero_de_page !== null){

            $numero_de_page = (int) $numero_de_page;

            // verifier($page);

            if($this->PagesMangas->getPageIdChapitre($id_chapitre,$numero_de_page) !== false){

                $page = $this->PagesMangas->getPageIdChapitre($id_chapitre,$numero_de_page);
    
            }else{
                
                if($numero_de_page !== 0){

                    $numero_de_page = $numero_de_page - 1;
    
                    $page = $this->PagesMangas->getPageIdChapitre($id_chapitre,$numero_de_page);


                }else{

                    $page = $this->PagesMangas->getPageIdChapitre($id_chapitre,1);

                }

                
            }

        }else{

            $page = $this->PagesMangas->getPageIdChapitre($id_chapitre,1);

        }

        // verifier($page);

        $this->render('Pages.pages',compact('page'));

    }

    public function comic(){

        $Comic = $this->mangas->getMangasByCategories('Comic');

        $this->render('Pages.comic',compact('Comic'));
    }

    public function bd(){

        $BD = $this->mangas->getMangasByCategories('BD');

        $this->render('Pages.bd',compact('BD'));
    }

    public function ligth_novel(){

        $Ligth_Novel = $this->mangas->getMangasByCategories('Ligth Novel');

        $this->render('Pages.ligth_novel',compact('Ligth_Novel'));
    }
}