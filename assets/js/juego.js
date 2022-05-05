
window.onload = () => {

    // REFRESCO PANEL USUARIOS ONLINE
    setInterval(() => {
        $.ajax({
            url: "?c=api",
            success: function(result) {
                $("#jugadores").html(result);
            }
        });
    }, 1500);

    // REFRESCO PANEL PARTIDAS ? INVITACIONES
    setInterval(() => {
        $.ajax({
            url: "?c=api&a=partidasenviadas",
            success: function(result) {
                $("#partidas_enviadas").html(result);
            }
        });
    }, 1500);



}