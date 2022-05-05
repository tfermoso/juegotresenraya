<?php

class PartidaController{
    public function jugar($id)
    {
        if(isset($_SESSION["user"])){
            $usuario=$_SESSION["user"]; 
            
            require_once("views/partida/index.php");
        }else{
            header("Location: ./");
        }
    }
    public function index()
    {
        header("Location: ./");
    }
}

?>