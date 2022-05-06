<?php
require_once("models/Partida_model.php");
class PartidaController
{
    public function jugar($id)
    {
        if (isset($_SESSION["user"])) {
            $usuario = $_SESSION["user"];
            $partida = new Partida($id);
            require_once("views/partida/index.php");
        } else {
            header("Location: ./");
        }
    }
    public function index()
    {
        header("Location: ./");
    }
    public function mover($idpartida)
    {
        if (isset($_GET["celda"])) {
            $usuario = $_SESSION["user"];
            $casilla = "casilla" . $_GET["celda"];
            $partida = new Partida($idpartida);
            $result=$partida->mover($casilla, $usuario["idusuario"],$idpartida);
            
        }
        $ruta = "Location: ./?c=partida&a=jugar&id=" . $idpartida;
        header($ruta);
    }
    
}
