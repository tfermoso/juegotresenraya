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
                <div class="col-2  jugador <?php echo ($usuario['idusuario'] == $partida->getIdJugador1()) ?'local':'visitante';?>
                 <?php echo ($usuario['idusuario'] == $partida->getIdJugador1()) ? ($partida->getJugadorActivo() == $usuario['idusuario'] ? 'miturno' : 'sinturno') : ''; ?>"><?php echo $partida->getNombreJugador1(); ?></div>
                <div class="col-8">
                    <section id="tablero">
                        <?php
                        $celdas = "";
                        for ($i = 0; $i < count($partida->getCeldas()); $i++) {
                            $valorCelda = "";
                            if ($partida->getCeldas()[$i] == $usuario["idusuario"]) {
                                $color='local';
                                $valorCelda =$partida->getCeldas()[$i]==$partida->getIdJugador1()?"x":"o";
                            } elseif ($partida->getCeldas()[$i] == -1) {
                                $color='';
                                if ($usuario['idusuario'] == $partida->getJugadorActivo()) {
                                    $valorCelda = "<a style='color:white;' href='./?c=partida&a=mover&id=" . $partida->getIdPartida() . "&celda=" . $i . "'>a</a>";
                                } else {
                                    $valorCelda = "";
                                }
                            } else {
                                $valorCelda =$partida->getCeldas()[$i]==$partida->getIdJugador1()?"x":"o";
                                $color='visitante';
                            }
                            $celdas .= "<div class='celda ".$color."' id='casilla" . $i . "'>" . $valorCelda . "</div>";
                        }
                        echo $celdas;
                        ?>


                    </section>
                </div>
                <div class="col-2  jugador <?php echo ($usuario['idusuario'] == $partida->getIdJugador2()) ?'local':'visitante';?> <?php echo ($usuario['idusuario'] == $partida->getIdJugador2()) ? ($partida->getJugadorActivo() == $usuario['idusuario'] ? 'miturno' : 'sinturno') : ''; ?>"><?php echo $partida->getNombreJugador2(); ?></div>
                <?php
        switch ($resultado) {
            case 0:
                echo "<div id='resultado'>Empate!!</div>";
                break;
            case -1:                
                break;
            case $usuario["idusuario"]:
                echo "<div id='resultado'>Has ganado!!</div>";
                break;
            default:
                echo "<div id='resultado'>Has perdido!!</div>";
                break;
        }
        ?>       
            </div>
        </div>
        
        
    </main>
</body>

</html>