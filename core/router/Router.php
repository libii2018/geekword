<?php 
    namespace Core\Router;

    class Router{
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){

            $url = $this->getUrl();
            

            if(ucfirst($url[0]) == 'Admin'){

                $url[0] = $url[1]; 
                $url[1] = $url[2]; 

                if(isset($url[3])){

                    $url[2] = $url[3];

                }

            }

            //Look in controllers for first value
            if(file_exists('..\App\Controller\\' . ucfirst($url[0]) . 'Controller.php')){
                //If esists, set as controller
                $this->currentController = '\App\Controller\\' . ucfirst($url[0]) . 'Controller';
                //Unset 0 Index
                unset($url[0]);

            }elseif(file_exists('..\App\Controller\Admin\\' . ucfirst($url[0]) . 'Controller.php')){
                //If esists, set as controller
                $this->currentController = '\App\Controller\Admin\\' . ucfirst($url[0]) . 'Controller';
                //Unset 0 Index
                unset($url[0]);

            }

            $this->currentController = new $this->currentController();

        
            //Ckeck for second part of url
            if(isset($url[1])){
                //Ckeck to see if method exists in controller
                if(method_exists($this->currentController,$url[1])){
                    $this->currentMethod = $url[1];
                    //Unset 1 index
                    unset($url[1]);
                }
            }

            //Get params
            $this->params = $url ? array_values($url) : [];

            //Call a callback with array of params
            call_user_func_array([$this->currentController,$this->currentMethod], $this->params);

        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
                
            }

        }
    }
    