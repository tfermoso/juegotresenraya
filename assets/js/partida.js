window.onload = function () {


    setInterval(() =>{
        $.ajax(
            {
                url: "?c=api&a=partida",
                success: function (result) {
                   $("#contenidoPartida").html(result);
                }
            });
       
    },3000);
    
}