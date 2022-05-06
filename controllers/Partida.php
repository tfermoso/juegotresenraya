<?php
require_once("models/Partida_model.php");

    class PartidaController {

        
        public function jugar($id) {
            
            if (isset($_SESSION["user"])) {
                $usuario = $_SESSION["user"]; 
                $partida = new Partida($id);
                require_once("views/partida/index.php");
                
            } else {
                header("Location: ./");
            }
        }

        public function index() {

            header("Location: ./");
        }

    }

?>