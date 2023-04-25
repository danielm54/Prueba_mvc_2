<?php

    class Pages extends Controller{

        public function __construct(){
            $this -> usuarioModelo = $this -> GetModel('Usuario');
        }

        public function Index(){

            //Obtener los usuarios
            
            $usuarios = $this -> usuarioModelo -> obtenerUsuarios(); 

            $data = ['usuarios' => $usuarios];

            $this -> GetView('/pages/inicio', $data);
        }

    }

?>