<?php

?>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Juego de Tres en Raya</a>
        <img class="logo" src="assets/img/logo.png">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo ($activo=="juego"?"active":""); ?>">
                    <a class="nav-link" href="./">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo ($activo=="clasificacion"?"active":""); ?>">
                    <a class="nav-link" href="./?c=clasificacion">Clasificación</a>
                </li>
               
            </ul>
        </div>

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