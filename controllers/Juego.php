<?php
require_once("models/Usuario_model.php");

    class JuegoController{
        public function index(){
            if(isset($_SESSION["user"])){
                $usuario = $_SESSION["user"];
                $usuarios = new Usuario();
                $usuarios_online=$usuarios->getUsuariosOnline();
                require_once("views/juego/index.php");
            } else {
                header("Location: ./");
            }
        }
    }
?>