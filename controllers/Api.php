<?php
require_once("models/Usuario_model.php");

    class ApiController{
        public function index()
        {
            $usuario=new Usuario();
            if( $usuario->keepAlive()>0){
                $usuarios_online=$usuario->getUsuariosOnline();
                $respuesta="";
                for ($i=0; $i < count($usuarios_online); $i++) { 
                    $respuesta.="<li id='".$usuarios_online[$i][0]."'>".$usuarios_online[$i][1]."</li>";
                }
               echo $respuesta;
            } 
        }       
    }
