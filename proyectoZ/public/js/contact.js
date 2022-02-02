window.onload = function(){
    document.getElementById("nombre").focus();
    document.getElementById("guardar").onclick = obligatorio;

}

  function limita(evento) {
    var elemento = document.getElementById("texto");
    if(elemento.value.length >= 150) {
      evento.preventDefault();
    }
}

function obligatorio(evento){
  valor = document.getElementById("email").value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
      alert("El campo DNI es obligatorio.");
      evento.preventDefault();
  }
}

    $(function(){
      $("#guardar").click(function(){
        $(".alert").animate({ 
          display: "block", 
      }, 1000); 
        $(".alert").slideDown();
      })
    })
