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
    <script src="./assets/js/partida.js"></script>

    <title>Tres en Raya</title>
</head>

<body id="loginPage">

<?php require_once("./views/fragments/cabecera.php"); ?>


    <main class="">
        <div class="cotainer-fluid">
            <div class="row" id="contenidoPartida">
                <div class="col-2 jugador <?php echo ($usuario['idusuario'] == $partida->getIdJugador1()) ? ($partida->getJugadorActivo() == $usuario['idusuario'] ? 'miturno' : 'sinturno') : ''; ?>"><?php echo $partida->getNombreJugador1(); ?></div>
                <div class="col-8">
                    <p><?php echo "Estado partida ".$partida->resultadoPartida() ?></p>
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