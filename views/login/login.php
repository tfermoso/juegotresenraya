<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Juego Tres en Raya</h1>
    <form action="" method="post">
        <input type="hidden" name="c" value="Login">
        <input type="hidden" name="a" value="logearse">
        <input type="text" name="usuario" id="">
        <input type="password" name="password" id="">
        <input type="submit" value="Login">
    </form>
    <p><?php if(isset($error)) echo $error; ?></p>
</body>
</html>