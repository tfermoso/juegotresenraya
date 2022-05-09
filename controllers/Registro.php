<?php
require_once("models/Usuario_model.php");

    class RegistroController{

        public function __construct()
        {
         
        }

        public function index()
        {   
 
            if(isset($_SESSION["user"])){
                header("Location: ?c=juego");
            }      
            require_once("views/registro/registro.php");
        }

        public function registrarse(){
            try {
                $nombre = $_POST["nombre"];
                $usuario = $_POST["usuario"];
                $password = $_POST["password"];
                $user = new Usuario();
                $registrarUsuario = $user->registarUsuario($nombre, $usuario, $password);
                if($registrarUsuario==false){
                    var_dump($_SESSION);
                    die();
                }
                header("Location: ./");
                // require("views/login/login.php");
                // if ($registrarUsuario) {
                //     $error = "Usuario o contraseña incorrecto";
                //     require("views/login/login.php");
    
                // } else {
                //     $_SESSION["user"] = $registrarUsuario;
                //     header("Location: ?c=juego");
                // }
            } catch (\Throwable $th) {
                var_dump($th);
                die();
            }
        }

    }

?>