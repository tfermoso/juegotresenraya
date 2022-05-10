<?php
class ClasificacionController{

    public function __construct()
    {
        # code...
    }
    public function index()
    {
        if (isset($_SESSION["user"])) {
            if (isset($_SESSION["user"]["idusuario"]) & $_SESSION["user"]["idusuario"] <> "") {
                $usuario=$_SESSION["user"];
                $activo="clasificacion";
                require_once("./views/clasificacion/index.php");            }else{
                header("Location: ./");
            }
        } else {

            header("Location: ./");
        } 

    }
}
?>