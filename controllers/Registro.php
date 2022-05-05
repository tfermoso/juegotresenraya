<?php
require_once("models/Usuario_model.php");


    class RegistroController {

        public function __construct()
        {
         
        }

        public function index()
        {   
            if (isset($_SESSION["user"])) {
                header("Location: ?c=juego");
            }      
            require_once("views/registro/registro.php");
        }

        public function registrarse() {

            try {
                $nombre = $_POST["nombre"];
                $usuario = $_POST["usuario"];
                $password = $_POST["password"];
                $user = new Usuario();
                $registrarUsuario = $user->registarUsuario($nombre, $usuario, $password);
                $msg="Nuevo usuario registrado ".$nombre;
                $_SESSION["mensajes"]=array($msg);
                header("Location: ./");
                
            } catch (\Throwable $th) {
                var_dump($th);
                die();
            }
        }

    }

?>