$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

function refrigerante() {
    $('#card-refrigerante').show();
    $('#card-hamburgueres').hide();
    $('#card-lanche').hide();
    $('#card-porcoes').hide();
    $('#card-bebidasalcoolicas').hide();
}
function hamburgueres() {
    $('#card-refrigerante').hide();
    $('#card-hamburgueres').show();
    $('#card-lanche').hide();
    $('#card-porcoes').hide();
    $('#card-bebidasalcoolicas').hide();
}

function lanches() {
    $('#card-refrigerante').hide();
    $('#card-hamburgueres').hide();
    $('#card-lanche').show();
    $('#card-porcoes').hide();
    $('#card-bebidasalcoolicas').hide();
}

function porcao() {
    $('#card-refrigerante').hide();
    $('#card-hamburgueres').hide();
    $('#card-lanche').hide();
    $('#card-porcoes').show();
    $('#card-bebidasalcoolicas').hide();
}

function bebidasalcoolicas() {
    $('#card-refrigerante').hide();
    $('#card-hamburgueres').hide();
    $('#card-lanche').hide();
    $('#card-porcoes').hide();
    $('#card-bebidasalcoolicas').show();    
}