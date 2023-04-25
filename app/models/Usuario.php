<?php

    class Usuario{

        public function __construct(){

            $this -> db = new Database();

        }

        public function obtenerUsuarios(){

            $this -> db -> query('SELECT * FROM clientes');
            $resultados = $this -> db -> registros();

            return $resultados;
        }

    }


?>