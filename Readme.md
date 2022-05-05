Tres en Raya
============

Aplicación web multijugador online del conocido y famoso juego [***Tres en Raya***](https://es.wikipedia.org/wiki/Tres_en_l%C3%ADnea).

Tecnologías empleadas en la realización del proyecto:
- **Lenguajes entorno cliente**: HTML, CSS, JS.
- **Lenguajes entorno servidor**: PHP.
- **Librerías**: Bootstrap, jQuery.


Tablas BBDD
-----------
- usuarios (idusuario, nombre, usuario, pass, estado)
- partidas (idpartida, jugador1, jugador2, jugador_activo, celda0 - celda8, turno, estado)
- salas (idpartida, idusuario, marcaDeTiempo)
- retos (jugador1, jugador2, estado)

Perfiles de usuario
-------------------
- Usuario
- Jugador

Casos de Uso
------------
- Usuario
  - Registrarse
  - Logearse
- Jugador
	- Ver partidas en juego del servidor (jugador 1 y jugador 2)
	- Ver clasificación
	- Añadirse a una partida (jugador1)
	- Crear una partida (y ponerse como jugador1)
	- Método buscadorDePartidas()
	- Turno jugarPartida
	- Retar a otro jugador
	- Salir
	