window.onload = function () {
  document.getElementById("check").onclick = showPass;
  document.getElementById("cambiador").onclick = cambiaForm;
  document.getElementById("cambiador2").onclick = cambiaForm;
};

function showPass() {
  var passwd = document.getElementById("passwd");

  if (passwd.type === "password") {
    passwd.type = "text";
  } else {
    passwd.type = "password";
  }
}

function cambiaForm(){
  var section = document.querySelector("section");
  var contenedor = document.querySelector(".contenedor");
  contenedor.classList.toggle('active');
  section.classList.toggle('active');
}
