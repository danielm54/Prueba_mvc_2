<?php

    class Core{

        protected $currentController = "Pages";
        protected $currentMethod = "index";
        protected $parameters = [];

        
        public function __construct(){

            //Recibe un array del método GetUrl()
            $url = $this -> GetUrl();
            
            //El controlador siempre se ubica en el primer índice
            $controller = ucwords($url[0]);
            
            if(file_exists('../app/controllers/'.$controller.'.php')){
                
                //Si existe se establece como controlador por defecto
                $this -> currentController = $controller;
                
                //Elimina el índice 0 del array
                unset($url[0]);

            }

            require_once '../app/controllers/'.$this -> currentController.'.php';

            //Crea el objeto del controlador que si existe 
            $this -> currentController = new $this -> currentController;

            if(isset($url[1])){

                if(method_exists($this -> currentController, $url[1])){

                    $this -> currentMethod = $url[1];    
                    unset($url[1]);
                }

            }

            $this -> param = $url ? array_values($url): [];
            
            call_user_func_array([$this -> currentController, $this -> currentMethod], $this -> param);


        }

        public function GetUrl(){

            
            if(isset($_GET['url'])){

                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

            }else{

                $url = ["Pages"];

            }
            
            return $url;

        }
        

    }

?>