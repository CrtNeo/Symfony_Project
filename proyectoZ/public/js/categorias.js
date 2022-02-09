$(function(){

    //BUSCADOR
    $(".boton-buscar").click(function(){
        var  valorInput = $(".input-search").val();
        $("form").attr("action", "/categoria/buscar/" + valorInput);
    })

    //DESPLEGAR AÑADIR
    $(".icono").click(() =>{
        $(".add").animate({
            opacity: 1,
            height: 'show'
        }, 450);
    });
    $(".cerrar").click(() =>{
        $(".formulario").trigger( "reset" );
        $(".add").animate({
            opacity: 0,
            height: 'hide'
        }, 450);
    });
    
    //AÑADIR
    $('#boton').click(()=>{
        $.ajax({
            url: "/categoria/añadir/ " + $("#tipo").val() + "/" + $("#marca").val() + + "/" + $("#nombre").val() + "/" + $("#pieza").val()  ,
            success: function (resultado) {
                $("#cuerpo-categoria").append(resultado);
                window.location.reload(true);
            }
          }).fail(()=>{

          })
    })

    //ELIMINAR
    $('.icono-delete').click(()=>{
        $(".vehiculo").fadeOut();
        $(".vehiculo").animate({
           display: "none"
        }, 450);    
    })

    
});