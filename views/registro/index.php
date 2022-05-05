<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Registro</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Juego de Tres en Raya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?c=login">Login</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="c" value="Registro">
                            <input type="hidden" name="a" value="registrarse">
                            <div class="form-group row">
                                <label for="real_name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" id="nombreReal" class="form-control" name="nombre" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name_user" class="col-md-4 col-form-label text-md-right">Usuario</label>
                                <div class="col-md-6">
                                    <input type="text" id="nombreUsuario" class="form-control" name="usuario" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Correo</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="correo" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_repeat" class="col-md-4 col-form-label text-md-right">Repetir contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" id="repass" class="form-control" name="repass" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                    </div>
                    </form>
                    <p><?php if(isset($error)) echo $error; ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
</body>
</html>