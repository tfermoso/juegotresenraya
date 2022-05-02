<?php
require_once("models/Usuario_model.php");
Class LoginController{
    public function __construct()
    {
        
    }

    public function index(){
        if(isset($_SESSION["user"])){
            header("Location: ?c=juego");
        }
        require_once("views/login/login.php");
    }

    public function logearse(){
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];

        $user = new Usuario();
        $usuarioLogeado=$user->get_usuario($usuario,$password);

        if($usuarioLogeado==NULL){
            $error="Usuario o contraseña incorrecto";
            require_once("views/login/login.php");
        } else {
            $_SESSION["user"]=$usuarioLogeado;
            header("Location: ?c=juego");
        }
    }
}

?>