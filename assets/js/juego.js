window.onload = function () {
    $.ajax(
        {
            url: "?c=api",
            success: function (result) {
                $("#jugadores").html(result);
            }
        });

}