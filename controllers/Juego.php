<?php
require_once("models/Usuario_model.php");

class JuegoController
{

    public function index()
    {
        if (isset($_SESSION["user"])) {
            if (isset($_SESSION["user"]["idusuario"]) & $_SESSION["user"]["idusuario"] <> "") {
                $usuario = $_SESSION["user"];
                $usuarios = new Usuario();
                $usuarios_online = $usuarios->getUsuariosOnline();
                $partidas_enviadas = $usuarios->partidasEnviadas($usuario["idusuario"]);
                $invitaciones_recibidas = $usuarios->invitacionesrecibidas($usuario["idusuario"]);
                $partidas_abiertas = $usuarios->partidasAbiertas($usuario["idusuario"]);
                $mis_partidas = $usuarios->misPartidas($usuario["idusuario"]);
                $activo="juego";
                require_once("views/juego/index.php");
            }else{
                header("Location: ./");
            }
        } else {

            header("Location: ./");
        }
    }

    public function invitar($idrival)
    {
        if (isset($_SESSION["user"])) {
            $usuario = $_SESSION["user"];
            $usuarios = new Usuario();
            $resultado = $usuarios->crearPartida($usuario["idusuario"], $idrival);
            if (!$resultado) {
                $error = "Error creando la partida.";
            }
            header("Location: ./?c=juego");
        } else {
            header("Location: ./");
        }
    }

    public function aceptar($idpartida)
    {
        if (isset($_SESSION["user"])) {
            $usuario = $_SESSION["user"];
            $usuarios = new Usuario();
            $resultado = $usuarios->aceptarPartida($idpartida);
            if ($resultado < 0) {
                $error = "Error aceptando la partida.";
            }
            header("Location: ./?c=juego");
        } else {
            header("Location: ./");
        }
    }

    public function unirse($idpartida)
    {
        $usuario = new Usuario();
        if ($usuario->unirme($idpartida, $_SESSION["user"]["idusuario"]) > 0) {
            $this->aceptar($idpartida);
        }
    }
}
