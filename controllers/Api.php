<?php
require_once("models/Usuario_model.php");
Class ApiController{
    public function index(){
        $usuario = new Usuario();
        if($usuario->keepAlive()>0){
            $usuarios_online=$usuario->getUsuariosOnline();
            $respuesta="";
            for ($i=0; $i < count($usuarios_online); $i++) { 
                $respuesta.="<li>".$usuarios_online[$i][1]."<a href='?c=juego&a=invitar&id=".$usuarios_online[$i][0]."'>Invitar</a></li>";
            }
            echo $respuesta;
        }
    }

    public function partidasenviadas()
    {
        $usuario = new Usuario();
        $idusuariolocal=$_SESSION["user"]["idusuario"];
        $partidas_enviadas=$usuario->partidasEnviadas($idusuariolocal);
        $li = "";
        for ($i=0; $i < count($partidas_enviadas); $i++) { 
            $li.="<li id='".$partidas_enviadas[$i][0]."'>".$partidas_enviadas[$i][1]."</li>";    
        }
        echo $li;
    }

    public function invitacionesrecibidas()
    {
        $usuario = new Usuario();
        $idusuariolocal=$_SESSION["user"]["idusuario"];
        $invitacionesrecibidas=$usuario->invitacionesrecibidas($idusuariolocal);
        $li = "";
        for ($i=0; $i < count($invitacionesrecibidas); $i++) { 
            $li.="<li id='".$invitacionesrecibidas[$i][0]."'>".$invitacionesrecibidas[$i][1]."<a href='?c=juego&a=aceptar&id=".$invitacionesrecibidas[$i][0]."'> Aceptar</a></li>";   
        }
        echo $li;
    }
    
}
?>