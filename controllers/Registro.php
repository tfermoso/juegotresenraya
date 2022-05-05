<?php

require_once("models/Usuario_model.php");

class RegistroController{
    public function index()
    {
        if(isset($_SESSION["user"])){
            header("Location: ?c=registro");
        }
        require_once("views/registro/index.php");
    }

    public function registrarse()
    {
        $nombre = $_POST["nombre"];
        $nombreUsuario = $_POST["usuario"];
        $pass = $_POST["password"];
        $user = new Usuario();
        $registrarUsuario = $user->registrarusuario($nombre,$nombreUsuario,$pass);

        if($registrarUsuario){
            header("Location: ./");
        } else {
            $error = "Error al crear el usuario.";
        }
    }
}

?>