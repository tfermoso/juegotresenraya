window.onload = function () {


    setInterval(() =>{
        $.ajax(
            {
                url: "?c=api&a=partida",
                success: function (result) {
                    console.log(result);
                    if(result==""){
                        location.reload();
                    }
                   $("#contenidoPartida").html(result);
                }
            });
       
    },3000);
    
}