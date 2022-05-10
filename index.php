<?php
require("config/Config.php");
require("config/database.php");
require("core/router.php");

session_start();
/*
Script principal (Puede recibir los párametros por GET o POSTS)
c=Controlador
a=Método del controlador
id=parámetro que se le pasa al método del contrololador;
*/
if (isset($_POST['c'])) {
    //Parámetros por POST
    //Cargamos el controlador
    $controlador = cargarControlador($_POST['c']);
    //Comprobamos si le pasamos la acción
    if (isset($_POST['a'])) {
        cargarAccion($controlador, $_POST['a']);
    } else {
        cargarAccion($controlador, ACCION_PRINCIPAL);
    }
} elseif (isset($_GET['c'])) {
    //Parámetros por GET
    //Cargamos controlador
    $controlador = cargarControlador($_GET['c']);
    //Comprobamos si le pasamos acción
    if (isset($_GET['a'])) {
       
        if (isset($_GET['id'])) {
            cargarAccion($controlador, $_GET['a'], $_GET['id']);
        } else {
            cargarAccion($controlador, $_GET['a']);
        }
    } else {
        cargarAccion($controlador, ACCION_PRINCIPAL);
    }
} else {
    //No recibo parámetros, ejecuto controlador y método por defecto
    //configurados en el fichero config.
    $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
    $accionTmp = ACCION_PRINCIPAL;
    $controlador->$accionTmp();
}
