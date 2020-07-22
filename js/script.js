$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

function Bebidas() {

    $('#card-bebidas').show();
    $('#card-porcao').hide();
}
function Porcao() {

    $('#card-bebidas').hide();
    $('#card-porcao').show();
}