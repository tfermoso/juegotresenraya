<?php
require_once("models/Usuario_model.php");

class JuegoController{

    public function index()
    {
        if(isset($_SESSION["user"])){
            $usuario=$_SESSION["user"]; 
            $usuarios=new Usuario();
            $usuarios_online=$usuarios->getUsuariosOnline();
            $partidas_enviadas=$usuarios->partidasEnviadas($usuario["idusuario"]);
            $invitaciones_recibidas=$usuarios->invitacionesrecibidas($usuario["idusuario"]);
            require_once("views/juego/index.php");
        }else{
            header("Location: ./");
        }
    }

    public function invitar($idrival)
    {
        if(isset($_SESSION["user"])){
            $usuario=$_SESSION["user"]; 
            $usuarios=new Usuario();
            $resultado=$usuarios->crearPartida($usuario["idusuario"],$idrival);
            if(!$resultado){
                $error="Error creando la partida.";
            }
            header("Location: ./?c=juego");
            
        }else{
            header("Location: ./");
        }
    }
}
