$(function(){

    //BUSCADOR
    $(".boton-buscar").click(function(){
        var  valorInput = $(".input-search").val();
        $("form").attr("action", "/categoria/buscar/" + valorInput);
    })

    //AÑADIR
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

    
});