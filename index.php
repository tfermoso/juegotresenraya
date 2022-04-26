<?php

require("config/Config.php");
require("core/router.php");

if(isset($_GET['c'])){
		
    $controlador = cargarControlador($_GET['c']);
    
    if(isset($_GET['a'])){
        if(isset($_GET['id'])){
            cargarAccion($controlador, $_GET['a'], $_GET['id']);
            } else {
            cargarAccion($controlador, $_GET['a']);
        }
        } else {
        cargarAccion($controlador, ACCION_PRINCIPAL);
    }
    
    } else {
    
    $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
    $accionTmp = ACCION_PRINCIPAL;
    $controlador->$accionTmp();
}

?>