<?php
require_once("models/Usuario_model.php");

    class LoginController{

        public function __construct()
        {
         
        }

        public function index()
        {
            
            require_once("views/login/login.php");
        }

        public function logearse(){
            $usuario=$_POST["usuario"];
            $password=$_POST["password"];
            $user=new Usuario();
            $usuarioLogeado=$user->get_usuario($usuario,$password);
            if($usuarioLogeado==NULL){
                $error="Usuario o contraseña incorrecto";
                require("views/login/login.php");
            }else{
                header("Location: ?c=juego");
            }
        }
    }

?>
