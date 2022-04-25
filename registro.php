<?php
require("config/database.php");

if(isset($_POST["usuario"])){
    $nombre=$_POST["nombre"];
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    $conn=Conectar::conexion();
    $consultaInsert="INSERT INTO usuario (nombre,usuario,password) VALUE (?,?,?)";
    $stm=$conn->prepare($consultaInsert);
    $stm->bind_param("sss",$nombre,$usuario,$password);
    try{
    $stm->execute();
    $resultado=$stm->get_result();
    if($resultado){
        var_dump($resultado);
    }
    } catch (\Throwable $th){
        var_dump($th->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="registro">
        <form action="" method="post">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="">
            <label for="">Usuario</label>
            <input type="text" name="usuario" id="">
            <label for="">Contraseña</label>
            <input type="password" name="password" id="">
            <input type="submit" value="Registrate">
        </form>
    </div>
</body>
</html>