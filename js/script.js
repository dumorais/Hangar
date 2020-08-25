$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#btn-cadastro').hide();
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
function Login(){
    var login = document.getElementById("login").value;
    var senha = document.getElementById("loginSenha").value;
    if (login == "Eduardo" && senha == "123456"){

        $('#btn-cadastro').show(); 

    }
}

function Promo1(){
    alert ("Adicionado ao carrinho!");
}

function Promo2(){
    alert ("Adicionado ao carrinho!");
}

function process(num){
    var value = parseInt(document.getElementById("num").innerHTML);
    console.log(value);
    value+=num;
    if(value < 1){
        document.getElementById("num").innerHTML = 1;
    }else{
        document.getElementById("num").innerHTML = value;
    }
}

function process2(num2){
    var value = parseInt(document.getElementById("num2").innerHTML);
    console.log(value);
    value+=num2;
    if(value < 1){
        document.getElementById("num2").innerHTML = 1;
    }else{
        document.getElementById("num2").innerHTML = value;
    }
}

