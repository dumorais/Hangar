$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

function Bebidas() {
  document.getElementById("card-bebidas").style.visibility = "visible";
  document.getElementById("card-porcao").style.visibility = "hidden";
}
function Porcao() {
  document.getElementById("card-bebidas").style.visibility = "hidden";
  document.getElementById("card-porcao").style.visibility = "visible";
}