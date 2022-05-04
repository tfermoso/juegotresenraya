<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="./assets/js/juego.js"></script>
    <title>Tres en raya</title>
</head>

<body id="loginPage">

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Juego de Tres en Raya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo $usuario["usuario"]; ?></a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="">
    <div class="cotainer-fluid">
        <h1>Juego del tres en raya</h1>
        <div class="row">
            <div class="col-7">
                <div class="row"><h3>Mis partidas</h3></div>
                <div class="row"><h3>Partidas en juego</h3></div>
            </div>
            <div class="col-5">
                <div class="usronline">
                    <h3>Usuarios online</h3>
                    <ul id="jugadores">
                        <?php
                            $li = "";
                            for ($i=0; $i < count($usuarios_online); $i++) { 
                                $li.="<li>".$usuarios_online[$i][1]."<a href='?c=juego&a=invitar&id=".$usuarios_online[$i][0]."'>Invitar</a></li>";
                                echo $li;
                            }
                        ?>
                    </ul>
                </div>
                <div>
                    <h3>Partidas pendientes de aceptacion</h3>
                    <ul id="partidas_enviadas">
                        <?php
                            $li = "";
                            for ($i=0; $i < count($partidas_enviadas); $i++) { 
                                $li.="<li id='".$partidas_enviadas[$i][0]."'>".$partidas_enviadas[$i][1]."</li>";
                                
                            }
                            echo $li;
                        ?>
                    </ul>
                </div>
                <div>
                    <h3>Partidas en las que he sido invitado</h3>
                    <ul id="invitacionesrecibidas">
                        <?php
                            $li = "";
                            for ($i=0; $i < count($invitaciones_recibidas); $i++) { 
                                $li.="<li id='".$invitaciones_recibidas[$i][0]."'>".$invitaciones_recibidas[$i][1]."<a href='?c=juego&a=aceptar&id=".$invitaciones_recibidas[$i][0]."'> Aceptar</a></li>";
                                
                            }
                            echo $li;
                        ?>
                    </ul>
                </div>
                <div>
                    <h3>Partidas abiertas</h3>
                    <ul id="partidas_abiertas">
                        <?php
                            $li = "";
                            for ($i=0; $i < count($partidas_abiertas); $i++) { 
                                $li.="<li id='".$partidas_abiertas[$i][0]."'>".$partidas_abiertas[$i][1]."<a href='?c=juego&a=unirme&id=".$partidas_abiertas[$i][0]."'> Unirse</a></li>";
                                
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