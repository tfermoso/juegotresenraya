<?php

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <title>Login</title>
</head>

<body id="loginPage">

    <!-- CABECERA -->
    <div class="row">
        <div class="mx-auto" id="cabecera-login-reg">
            <img src="assets/img/logo3.webp">
        </div>
    </div>

    <!-- FORMULARIO -->
    <main class="login-form">
        <div class="cotainer">
            <?php
            if (isset($_SESSION["mensajes"])) {
                for ($i = 0; $i < count($_SESSION["mensajes"]); $i++) {
                    echo "<div class='alert'>" . $_SESSION["mensajes"][$i] . "</div>";
                }
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-xs-4">
                    <div class="card">
                        <div class="card-header" id="cabecera-formulario">
                            LOGIN APLICACIÓN <br><a href="?c=registro">- Ir a Registro -</a>
                        </div>
                        <div class="card-body" id="contenido-formulario">

                            <form action="" method="post">
                                <input type="hidden" name="c" value="Login">
                                <input type="hidden" name="a" value="logearse">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Usuario</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="usuario" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-8 mx-auto" id="c_btnsubmit">
                                    <button type="submit" class="btn btn-primary btn-block" id="btnsubmit">
                                        Login
                                    </button>
                                </div>
                            </form>

                        </div>
                        <p><?php if (isset($error)) echo $error; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>