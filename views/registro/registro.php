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

    <title>Registro</title>
</head>

<body id="registerPage">

    <!-- CABECERA -->
    <div class="row">
        <div class="mx-auto" id="cabecera-login-reg">
            <img src="assets/img/logo2.webp">
        </div>
    </div>

    <!-- FORMULARIO -->
    <main class="register-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-xs-3">
                    <div class="card">
                        <div class="card-header" id="cabecera-formulario">
                            REGISTRO DE USUARIO <br><a href="?c=login">- Ir a Login -</a>
                        </div>
                        
                        <div class="card-body" id="contenido-formulario">

                            <form action="" method="post">
                                <input type="hidden" name="c" value="Registro">
                                <input type="hidden" name="a" value="registrarse">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Nombre real</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="nombre" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Usuario</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="usuario" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row" id="registro-pass">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="col-md-8 mx-auto" id="c_btnsubmit">
                                    <button type="submit" class="btn btn-secondary btn-block" id="btnsubmit">
                                        Registrar Usuario
                                    </button>
                                </div>
                            </form>

                        </div>
                        <p><?php if(isset($error)) echo $error; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>