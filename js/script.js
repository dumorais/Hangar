$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    MenuActive();

    if(!localStorage.getItem("produtos")){
        var produtos = [];
        localStorage.setItem("produtos", JSON.stringify(produtos));
    }
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


function BTN_qnt(operador, idproduto, nome, preco, carrinho=false){
    var value = parseInt($("#preco-" + idproduto).html());
    value+=operador;

    if(value < 1){
        if(!carrinho){
            $("#preco-" + idproduto).html(0);
        }else{
            return false;
        }
    }else{
        if(carrinho){
            var total = parseInt($("#valor-total").html());
            var total_att = total + (parseInt(operador) * parseInt(preco));
            $("#total").html("<b>Total: R$<span id='valor-total'>" + total_att + "</span></b>");
        }
        $("#preco-" + idproduto).html(value);
    }

    Manter_sessao(idproduto, nome, preco, value);

}

function Manter_sessao(idproduto, nome, preco, value)
{
    var produto = {
        id: idproduto, 
        nome: nome,
        preco: preco,
        qtd: value
    };

    var produtos = JSON.parse(localStorage.getItem("produtos"));
    var busca_produto = produtos? produtos.find(
        function(item){
            return JSON.stringify(item.id) == JSON.stringify(produto.id);
        }
    ) : null;


    if(busca_produto){
        var idx = produtos.findIndex(function(item){
            return JSON.stringify(item.id) == JSON.stringify(produto.id);
        });
        if(value < 1 ){
            produtos.splice(idx,1);
        }else{
            produtos[idx] = produto;
        }
    }else{
        produtos.push(produto);
    }
    localStorage.setItem("produtos", JSON.stringify(produtos));

}

function Carregar_carrinho(){

    var total = 0;
    var produtos = localStorage.getItem("produtos"); 
    if(produtos){

        $.each(JSON.parse(produtos), function( index, value ) {
            var div = `
<div class="row mb-4" id="div-carrinho-${value.id}">


<div class="col-md-3 text-center">
<h2>${value.nome}</h2>
</div>
<div class="col-md-3 col-12 text-center py-2">
<p><b>Valor: RS${value.preco}</b></p>
</div>


<div class="col-md-3 text-center py-2">
<button class="btn btn-outline-danger tamanho" type="button" onclick="BTN_qnt(-1,'${value.id}', '${value.nome}', '${value.preco}', true) ">-</button>

<button class="btn btn-outline-success tamanho" type="button" onclick="BTN_qnt(1, '${value.id}', '${value.nome}', '${value.preco}', true)" >+</button>

<label id="preco-${value.id}">${value.qtd}</label> <label>x</label> 
</div>

<div class="col-md-3 py-2">
<div class="text-center">
<button class="btn btn-secondary" type="button" onclick="Confirmar_exclusao('${value.id}')">Excluir produto</button>
</div> 
</div>

</div>
`;
            total += parseInt(value.preco) * parseInt(value.qtd);
            $("#div-produtos").append(div);
        }); 
    }
    $("#total").html("<b>Total: R$<span id='valor-total'>" + total + "</span></b>");
}

function Produto_Excluir(idproduto){
    var produtos = JSON.parse(localStorage.getItem("produtos"));
    var idx = produtos.findIndex(
        function(item){
            return item.id == idproduto;
        }
    );

    var total = parseInt($("#valor-total").html());
    var total_att = total - parseInt(produtos[idx].preco) * parseInt(produtos[idx].qtd);
    $("#total").html("<b>Total: R$<span id='valor-total'>" + total_att + "</span></b>");

    produtos.splice(idx , 1);
    localStorage.setItem("produtos", JSON.stringify(produtos));
    $(`#div-carrinho-${idproduto}`).remove(); 
}

function Confirmar_exclusao(idproduto){
    var resposta = confirm("Tem certeza que deseja remover do carrinho?");
    if (resposta == true) {
        Produto_Excluir(idproduto);
    } else {
        return false;
    }
}

function Get_qtd_produtos(){
    var produtos = JSON.parse(localStorage.getItem("produtos"));
    $.each(produtos, function( index, value ) {
        $("#preco-" + value.id).html(value.qtd);
    });
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

    if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
        alert ("CPF inválido!");
        return false;
    }

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
    $("#modalLogin").modal('show');
    alert("Faça o login para prosseguir");
}


function AbrirModal(){
    $("#modalLogin").modal('show');
}

function Excluir(idproduto){
    $('#idproduto').val(idproduto);
    document.getElementById("form_produto").submit();
}
function Confirmar_exclusao_adm(idproduto){
    var resposta = confirm("Tem certeza que deseja excluir o produto?");
    if (resposta == true) {
        Excluir(idproduto);
    } else {
        return false;
    }
}





