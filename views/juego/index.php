<?php

    // if (isset($_POST["cerrarSesion"])) {
    //     // eliminar todas las variables de sesión
    //     session_unset();
    //     // destruir la sesión
    //     session_destroy();
    //     // refrescar página, sin sesión redirigirá a login
    //     header("Refresh:0");
    // }
    
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
                        <!-- INFO DE USUARIO Y CIERRE DE SESIÓN -->
                        <a class="nav-link" href=""><?php echo $usuario["usuario"]; ?></a>
                        <form action="" method="post">
                            <input type="hidden" name="c" value="Login">
                            <input type="hidden" name="a" value="cerrarSesion">
                            <input type="submit" value="Cerrar Sesión">
                        </form>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main class="">
        <div class="cotainer-fluid">
            <div class="row">
                <div class="col-7">
                    <div class="">
                        <h3>Mis partidas</h3>
                        <div id="mispartidas">
                        <?php
                            $divs="";
                            for ($i=0; $i < count($mis_partidas); $i++) { 
                                $turno=$usuario['idusuario']==$mis_partidas[$i][2]?'miturno':'';
                                $divs.="<div  class='".$turno."'> Partida con ".$mis_partidas[$i][1]." <a href='?c=partida&a=jugar&id=".$mis_partidas[$i][0]."'>entrar</a></div>";
                            }
                            echo $divs;
                        ?>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Partidas en Juego</h3>
                    </div>
                </div>
                <div class="col-5">
                    <div class="usronline">
                        <h3>Usuarios Online</h3>
                        <ul id="jugadores">
                            <?php
                                $li="";
                                for ($i=0; $i < count($usuarios_online); $i++) { 
                                   $li.="<li>".$usuarios_online[$i][1]." <a href='?c=juego&a=invitar&id=".$usuarios_online[$i][0]."'>Invitar</a></li>";
                                }
                                echo $li;
                            ?>
                        </ul>
                    </div>
                    <div class="">
                        <h3>Partidas pendientes de aceptación</h3>
                        <ul id="partidas_enviadas">
                            <?php
                                $li="";
                                for ($i=0; $i < count($partidas_enviadas); $i++) { 
                                   $li.="<li id='".$partidas_enviadas[$i][0]."'>".$partidas_enviadas[$i][1]."</li>";
                                }
                                echo $li;
                            ?>
                        </ul>
                    </div>
                    <div class="">
                        <h3>Partidas en las que he sido invitado</h3>
                        <ul id="invitaciones_recibidas">
                            <?php
                                $li="";
                                for ($i=0; $i < count($invitaciones_recibidas); $i++) { 
                                   $li.="<li>".$invitaciones_recibidas[$i][1]." <a href='?c=juego&a=aceptar&id=".$invitaciones_recibidas[$i][0]."'>Aceptar</a></li>";
                                }
                                echo $li;
                            ?>
                        </ul>
                    </div>
                    <div class="">
                        <h3>Partidas abiertas</h3>
                        <ul id="partidas_abiertas">
                            <?php
                                $li="";
                                for ($i=0; $i < count($partidas_abiertas); $i++) { 
                                   $li.="<li>".$partidas_abiertas[$i][1]." <a href='?c=juego&a=unirse&id=".$partidas_abiertas[$i][0]."'>Unirme</a></li>";
                                }
                                echo $li;
                            ?>
                        </ul>
                    </div>
                </div>               
            </div>
        </div>
    </main>
</body>

</html>