window.onload = function () {


    setInterval(() => {
        $.ajax(
            {
                url: "?c=api",
                success: function (result) {
                    $("#jugadores").html(result);
                }
            });
    }, 3000);


}