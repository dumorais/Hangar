$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    MenuActive();
   
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

function CheckForm(form){


    var senha= form_cliente.Senha.value;
    var Confirma= form_cliente.Confirmar.value;
    
    if(senha != Confirma){
        alert("SENHAS DIFERENTES !");
        form_cliente.Senha.focus();
        return false;

    }

    if (!CheckCPF(form)){
        form_cliente.CPF.focus();
        return false;
    }

    return true;
}

function CheckCPF(form){
    var cpf = form_cliente.CPF.value.replace(/([.]|[-])/gi,'');
    var soma = 0;
    var resto =0;
    var d1 = 0;
    var d2 = 0;

    for (i=1; i<=9; i++){
        soma += parseInt(cpf.substring(i-1,i)) * (11-i);
    }
    resto = soma % 11;
    if ((resto == 0) || (resto == 1)){
        d1 = 0;
    }else{
        d1 = 11 - resto;
    }
    if (cpf.substring(9,10) != d1){
        alert("CPF inválido!")
        return false;
    }
    soma = 0;
    for (i=1; i<=10; i++){
        soma += parseInt(cpf.substring(i-1,i)) * (12-i);
    }
    resto = soma % 11;
    if ((resto == 0) || (resto == 1)){
        d2 = 0;
    }else{
        d2 = 11 - resto;
    }
    if (cpf.substring(10,11) != d2){
        alert ("CPF inválido!");
        return false;
    }
    return true;
}

function MenuActive(){
     $('.nav-item').click(MenuActive);
    var index = document.URL.lastIndexOf("/") + 1;
    var menu = document.URL.substring(index);
    var link = $('a[href="'+menu+'"]');
    link.parent().addClass("active");
}

function Alert_Login(){
    alert("Faça o login para prosseguir");
}

function AbrirModal(){
    $("#modalLogin").modal('show');
    alert("Login ou senha incorretos");
}

function Excluir(idproduto){
    $('#idproduto').val(idproduto);
    document.getElementById("form_produto").submit();
}