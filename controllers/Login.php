<?php
require_once("models/Usuario_model.php");

    class LoginController{

        public function __construct()
        {
         
        }

        public function index()
        {   
            if(isset($_SESSION["user"])){
                header("Location: ?c=juego");
            }      
            require_once("views/login/login.php");
        }

        public function logearse() {
            $usuario=$_POST["usuario"];
            $password=$_POST["password"];
            $user=new Usuario();
            $usuarioLogeado=$user->get_usuario($usuario,$password);

            if ($usuarioLogeado==NULL) {
                $error="Usuario o contraseña incorrecto";
                require("views/login/login.php");

            } else {
                $_SESSION["user"]=$usuarioLogeado;
                header("Location: ?c=juego");
            }
        }

        public function cerrarSesion() {

            // eliminar todas las variables de sesión
            session_unset();
            // destruir la sesión
            session_destroy();
            // refrescar página, sin sesión redirigirá a login
            header("Refresh:0");
            
        }

    }

?>
