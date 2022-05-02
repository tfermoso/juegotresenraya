<?php
    class JuegoController{
        public function index(){
            if(isset($_SESSION["user"])){
                $usuario = $_SESSION["user"];
                require_once("views/juego/index.php");
            } else {
                header("Location: ./");
            }
        }
    }
?>