<?php

class PartidaController{
    public function jugar($id)
    {
        if(isset($_SESSION["user"])){
            $usuario=$_SESSION["user"]; 
            $partida=new Partida();
            
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