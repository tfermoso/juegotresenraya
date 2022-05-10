window.onload = function () {


  var peticiones=  setInterval(() =>{
        $.ajax(
            {
                url: "?c=api&a=partida",
                success: function (result) {

                    if(result==""){
                        location.reload();
                    }
                   $("#contenidoPartida").html(result);
                   if($("#resultado").text()!=""){
                       clearInterval(peticiones);
                   }

                }
            });
       
    },3000);
    
}