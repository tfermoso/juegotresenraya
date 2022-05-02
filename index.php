<?php

require("config/Config.php");
require("core/router.php");
require("config/database.php");

session_start();

if(isset($_POST['c'])){
		
    $controlador = cargarControlador($_POST['c']);
    
    if(isset($_POST['a'])){
        cargarAccion($controlador, $_POST['a']);
    } else {
        cargarAccion($controlador, ACCION_PRINCIPAL);
    }
    
} else if(isset($_GET['c'])){
		
    $controlador = cargarControlador($_GET['c']);
    
    if(isset($_GET['a']) || isset($_GET[''])){
        if(isset($_GET['id'])){
            cargarAccion($controlador, $_GET['a'], $_GET['id']);
            } else {
            cargarAccion($controlador, $_GET['a']);
        }
    } else {
        cargarAccion($controlador, ACCION_PRINCIPAL);
    }
    
}else {
    
    $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
    $accionTmp = ACCION_PRINCIPAL;
    $controlador->$accionTmp();
}

?>