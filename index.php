<?php
require("config/database.php");
session_start();

if (isset($_POST["usuario"])) {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $conn = Conectar::conexion();
    //$consultaLogin="select * form usuario where idusuario=? and password=?";
    $consultaInsert = "insert into usuario (nombre,usuario,password) value (?,?,?)";
    $stm = $conn->prepare($consultaInsert);
    $stm->bind_param("sss", $nombre, $usuario, $password);
    try {
        //code...
        $stm->execute();
        $resultado = $stm->get_result();
        if ($resultado) {
            var_dump($resultado);
        }
    } catch (\Throwable $th) {
        $error=$th->getMessage();
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
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="usuario" id="" placeholder="usuario">
        <input type="password" name="password" id="" placeholder="password">
        <input type="submit" value="Nuevo Usuario">
    </form>
    <p><?php if(isset($error)) echo $error; ?></p>
</body>

</html>