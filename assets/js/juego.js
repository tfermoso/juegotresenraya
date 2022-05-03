window.onload = function () {

/*
    setInterval(() => {
        $.ajax(
            {
                url: "?c=api",
                success: function (result) {
                    $("#jugadores").html(result);
                }
            });
    }, 3000);

*/

setInterval(() => {
    $.ajax(
        {
            url: "?c=api&a=partidasenviadas",
            success: function (result) {
                $("#partidas_enviadas").html(result);
            }
        });
}, 3000);
}