<?php

    class Controller{

        public function GetModel($model){

            require_once '../app/models/'.$model.'.php';

            return new $model();

        }

        public function GetView($view, $data = []){

            if(file_exists('../app/views/'.$view.'.php')){

                require_once '../app/views/'.$view.'.php';

            }else{
                die('<br>La vista solicitada NO existe.');

            }
            
        }

        

    }

?>