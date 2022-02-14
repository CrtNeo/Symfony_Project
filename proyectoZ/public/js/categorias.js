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

    //ELIMINAR
    $('.icono-delete').click(()=>{
        $(".vehiculo").fadeOut();
        $(".vehiculo").animate({
           display: "none"
        }, 450);    
    })

    
});