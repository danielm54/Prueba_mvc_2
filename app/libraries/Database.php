<?php

    class Database{

        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSW;
        private $base_name = DB_NAME;

        //Database handler
        private $dbh;

        private $stmt;
        private $error;

        public function __construct(){
            //Configurar conexión
            $dsn = 'mysql:host='. $this -> host. ';dbname='. $this -> base_name;

            $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            //Crear una instancia de PDO
            try {
                $this -> dbh = new PDO($dsn, $this -> user, $this -> password, $options);
                
                //Para caracteres especiales
                $this -> dbh -> exec('set names utf8');

            } catch(Exception $e){
                $this -> error = $e -> getMessage();
                echo $this -> error;  
            }
        }

        public function query($sql){
            $this -> stmt = $this -> dbh -> prepare($sql);  
        }

        public function bind($parametro, $valor, $tipo = null){

            if(is_null($tipo)){

                switch(true){
                    case is_int($valor):

                        $tipo = PDO::PARAM_INT;

                    break;

                    case is_bool($valor):

                        $tipo = PDO::PARAM_BOLL;
    
                    break; 
                        
                    case is_null($valor):

                        $tipo = PDO::PARAM_NULL;
    
                    break; 
                        
                    default:
                    
                        $tipo = PDO::PARAM_STR;

                    break;
                }

            }

            $this -> stmt -> bindValue($parametro, $valor, $tipo);

        }

        public function execute(){

           return $this -> stmt -> execute();
            
        }

        public function registros(){

           $this -> execute();
           return $this -> stmt -> fetchAll(PDO::FETCH_OBJ); 

        }

        public function registro(){

           $this -> execute();
           return $this -> stmt -> fetch(PDO::FETCH_OBJ); 

        }

        public function rowCount(){

           return $this -> stmt -> rowCount(); 

        }

    }

?>