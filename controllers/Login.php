<?php
require_once("models/Usuario_model.php");

    class LoginController{

        public function __construct()
        {
         
        }

        public function index()
        {   
            if(isset($_SESSION["user"])){
                if(isset($_SESSION["user"]["idusuario"])<>""){
                    header("Location: ?c=juego");
                }
                
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

            session_start();
            session_unset();
            session_destroy();
            session_write_close();
            setcookie(session_name(),$_COOKIE["PHPSESSID"],time()-60);

            session_regenerate_id(true);
            /*
            // eliminar todas las variables de sesión
            session_unset();
            // destruir la sesión
            session_destroy();
            // refrescar página, sin sesión redirigirá a login
            */
            header("Location: ./");
            
        }

    }
