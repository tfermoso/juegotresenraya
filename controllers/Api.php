<?php
require_once("models/Usuario_model.php");
require_once("models/Partida_model.php");

class ApiController
{
    public function index()
    {
        $usuario = new Usuario();
        if ($usuario->keepAlive() > 0) {
            $usuarios_online = $usuario->getUsuariosOnline();
            $respuesta = "";
            for ($i = 0; $i < count($usuarios_online); $i++) {
                $respuesta .= "<li>" . $usuarios_online[$i][1] . " <a href='?c=juego&a=invitar&id=" . $usuarios_online[$i][0] . "'>Invitar</a></li>";
            }
            echo $respuesta;
            die();
        }
    }

    public function partidasenviadas()
    {
        $usuario = new Usuario();
        $idusuariolocal = $_SESSION["user"]["idusuario"];
        $partidas_enviadas = $usuario->partidasEnviadas($idusuariolocal);
        $li = "";
        for ($i = 0; $i < count($partidas_enviadas); $i++) {
            $li .= "<li id='" . $partidas_enviadas[$i][0] . "'>" . $partidas_enviadas[$i][1] . "</li>";
        }
        echo $li;
        die();
    }

    public function partida()
    {
        $respuesta = "";
        if (isset($_SESSION["user"])) {
            $usuario = $_SESSION["user"];
            if (isset($_SESSION["idpartida"])) {
                $idPartida = $_SESSION["idpartida"];
                $partida = new Partida($idPartida);
            }
            $clase = $usuario['idusuario'] == $partida->getIdJugador1() ? ($partida->getJugadorActivo() == $usuario['idusuario'] ? 'miturno' : 'sinturno') : '';
            $respuesta .= "<div class='col-2 jugador " . $clase . "'>" . $partida->getNombreJugador1() . "</div>";
            $respuesta.= "<div class='col-8'> <section id='tablero'>"; 

            $celdas = "";
            for ($i = 0; $i < count($partida->getCeldas()); $i++) {
                $valorCelda = "";
                if ($partida->getCeldas()[$i] == $usuario["idusuario"]) {
                    $valorCelda = $partida->getCeldas()[$i] == $partida->getIdJugador1() ? "x" : "o";
                } elseif ($partida->getCeldas()[$i] == -1) {
                    if ($usuario['idusuario'] == $partida->getJugadorActivo()) {
                        $valorCelda = "<a style='color:white;' href='./?c=partida&a=mover&id=" . $partida->getIdPartida() . "&celda=" . $i . "'>a</a>";
                    } else {
                        $valorCelda = "";
                    }
                } else {
                    $valorCelda = $partida->getCeldas()[$i] == $partida->getIdJugador1() ? "x" : "o";
                }
                $celdas .= "<div class='celda' id='casilla" . $i . "'>" . $valorCelda . "</div>";
            }
            $respuesta.=$celdas;
            $respuesta.="</section></div>";
            $clase=($usuario['idusuario'] == $partida->getIdJugador2()) ? ($partida->getJugadorActivo() == $usuario['idusuario'] ? 'miturno' : 'sinturno') : ''; 
            $respuesta.="<div class='col-2 jugador ".$clase."'>". $partida->getNombreJugador2()."</div>";
            echo $respuesta;
            die();
        }
    }
}
