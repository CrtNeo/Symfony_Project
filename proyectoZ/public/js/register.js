window.onload = function () {
  document.getElementById("check").onclick = showPass;
};

function showPass() {
  var passwd = document.getElementById("passwd");

  if (passwd.type === "password") {
    passwd.type = "text";
  } else {
    passwd.type = "password";
  }
}
