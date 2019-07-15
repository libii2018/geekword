<?php
namespace Core\controller;

class controller{

    protected $viewPath;

    protected $templates;

    protected function render($view, $variables = []){

        ob_start();

        extract($variables);

        require($this->viewPath . str_replace('.', '/', $view) . '.php');

        $content = ob_get_clean();

        require($this->viewPath . 'templates/' . $this->templates . '.php');
    }

    protected function addImage($files){
        

        move_uploaded_file($files['file']['tmp_name'], URLBASE.'/public/img/'.$files['file']['name']);

        return $files['file']['name'];
    } 

    

    protected function forbidden(){

        header('HTTP/1.0 403 Forbidden');

        die('Acces interdit');

    }

    protected function notFound(){

        header('HTTP/1.0 403 Forbidden');

        die('Page introuvable');

    }

}