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
}
?>