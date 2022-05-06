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
    <script src="assets/js/partida.js"></script>

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
            <div class="row">
                <div class="col-2 jugador <?php echo ($usuario['idusuario']==$partida->getIdJugador1())?($partida->getJugadorActivo()==$usuario['idusuario']?'miturno':'sinturno'):''; ?>"><?php echo $partida->getNombreJugador1(); ?></div>
                <div class="col-8">
                    <section id="tablero">
                        <?php
                           $celdas = "";
                            for ($i = 0; $i < count($partida->getCeldas()); $i++) {
                                $valorCelda = "";

                                if ($partida->getCeldas()[$i] == $usuario["idusuario"]) {
                                    $valorCelda =$partida->getCeldas()[$i]==$partida->getIdJugador1()?"x":"o";
                                } elseif ($partida->getCeldas()[$i] == -1) {
                                    if ($usuario['idusuario'] == $partida->getJugadorActivo()) {
                                        $valorCelda = "<a style='color:white;' href='./?c=partida&a=mover&id=" . $partida->getIdPartida() . "&celda=" . $i . "'>a</a>";
                                    } else {
                                        $valorCelda = "";
                                    }

                                } else {
                                    $valorCelda =$partida->getCeldas()[$i]==$partida->getIdJugador1()?"x":"o";
                                }
                                $celdas .= "<div class='celda' id='casilla" . $i . "'>" . $valorCelda . "</div>";
                            }
                            echo $celdas;
                        ?>
                    </section>
                </div>
                <div class="col-2 jugador <?php echo ($usuario['idusuario'] == $partida->getIdJugador2()) ? ($partida->getJugadorActivo() == $usuario['idusuario'] ? 'miturno' : 'sinturno') : ''; ?>"><?php echo $partida->getNombreJugador2(); ?></div>
            </div>
        </div>
    </main>
</body>

</html>