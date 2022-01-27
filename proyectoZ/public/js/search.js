$(function(){
    $(".boton-buscar").click(function(){
        var  valorInput = $(".input-search").val();
        $("form").attr("action", "/categoria/buscar/" + valorInput);
    })
});