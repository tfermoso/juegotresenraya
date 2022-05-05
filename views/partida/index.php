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
    <script src="./assets/js/juego.js"></script>

    <title>Tres en Raya</title>
</head>

<body id="loginPage">

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Juego de Tres en Raya</a>
            <img class="logo" src="assets/img/logo.png">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?php echo $usuario["usuario"]; ?></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main class="">
        <div class="cotainer-fluid">
            <h1>Juego del tres en raya</h1>
            <section id="tablero">
                <div class="fila">
                    <div class="celda"></div>
                    <div class="celda"></div>
                    <div class="celda"></div>
                </div>
                <div class="fila">
                    <div class="celda"></div>
                    <div class="celda"></div>
                    <div class="celda"></div>
                </div>
                <div class="fila">
                    <div class="celda"></div>
                    <div class="celda"></div>
                    <div class="celda"></div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>