$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    //Ativar o componente tooltip
    
    MenuActive();
    //Chamando a função MenuActive para o usuario clicar e o nome da página ficar verde

    if(!localStorage.getItem("produtos")){
        var produtos = [];
        //Declarando um array chamado produtos
        localStorage.setItem("produtos", JSON.stringify(produtos));
        //Iniciando o array dentro do localStorage
    }
});

function refrigerante() {
    //Function para esconder os cards e aparecer o card de refrigerante
    $('#card-refrigerante').show();
    $('#card-hamburgueres').hide();
    $('#card-lanche').hide();
    $('#card-porcoes').hide();
    $('#card-bebidasalcoolicas').hide();
    //Dando um show no card de refrigerante e escondendo os outros
}
function hamburgueres() {
    //Function para esconder os cards e aparecer o card de hamburguers
    $('#card-refrigerante').hide();
    $('#card-hamburgueres').show();
    $('#card-lanche').hide();
    $('#card-porcoes').hide();
    $('#card-bebidasalcoolicas').hide();
    //Dando um show no card de hamburguers e escondendo os outros
}

function lanches() {
    //Function para esconder os cards e aparecer o card de lanches
    $('#card-refrigerante').hide();
    $('#card-hamburgueres').hide();
    $('#card-lanche').show();
    $('#card-porcoes').hide();
    $('#card-bebidasalcoolicas').hide();
    //Dando um show no card de lanches e escondendo os outros
}

function porcao() {
    //Function para esconder os cards e aparecer o card de porções
    $('#card-refrigerante').hide();
    $('#card-hamburgueres').hide();
    $('#card-lanche').hide();
    $('#card-porcoes').show();
    $('#card-bebidasalcoolicas').hide();
    //Dando um show no card de porções e escondendo os outros
}

function bebidasalcoolicas() {
    //Function para esconder os cards e aparecer o card de bebidas alcóolicas
    $('#card-refrigerante').hide();
    $('#card-hamburgueres').hide();
    $('#card-lanche').hide();
    $('#card-porcoes').hide();
    $('#card-bebidasalcoolicas').show(); 
    //Dando um show no card de bebidas alcóolicas e escondendo os outros
}



function BTN_qnt(operador, idproduto, nome, preco, carrinho=false){
    //Function dos botões de quantidade do cardápio
    
    var value = parseInt($("#preco-" + idproduto).html());
    //jogando a quantidade da label preco concatenando com o id do produto na variavel
    value+=operador;
    //var value é igual a soma do operador

    if(value < 1){
        //Se a var value for menor que 1
        if(!carrinho){
            //se carrinho for falso
            $("#preco-" + idproduto).html(0);
            //a label preco-idproduto é igual a 0
        }else{
            return false;
            //se for verdadeiro retorna false
        }
    }else{
        //se o value for maior que 1
        if(carrinho){
            //se carrinho for verdadeiro
            var total = parseInt($("#valor-total").html());
            //Jogando o valor total da conta na variavel total
            var total_att = total + (parseInt(operador) * parseInt(preco));
            //Jogando o total + o operador da quantidade vezes o preço na variavel do total atualizado
            $("#total").html("<b>Total: R$<span id='valor-total'>" + total_att + "</span></b>");
            //Mostrando o total na tela onde o id no html é igual a total
        }
        $("#preco-" + idproduto).html(value);
        //Atualizando a quantidade do produto no cardápio
    }

    Manter_sessao(idproduto, nome, preco, value);
    //Chamando a function de manter sessão

}

function Manter_sessao(idproduto, nome, preco, value){
    var produto = {
        id: idproduto, 
        nome: nome,
        preco: preco,
        qtd: value
    };
    //Colocando o id, o nome, o preço e a quantidade dos produtos na variavel produto
    var produtos = JSON.parse(localStorage.getItem("produtos"));
    //Pegando produtos salvos no localStorage
    var busca_produto = produtos? produtos.find(
        function(item){
            return JSON.stringify(item.id) == JSON.stringify(produto.id);
        }
    ) : null;
    //Indo na lista, procurando o produto que foi atualizado


    if(busca_produto){
        var idx = produtos.findIndex(function(item){
            return JSON.stringify(item.id) == JSON.stringify(produto.id);
        });
        //Se achou um produto, pega o index do mesmo
        if(value < 1 ){
            produtos.splice(idx,1);
            //Se o value for menor que 1, excluindo o produto do array
        }else{
            produtos[idx] = produto;
            //Se for maior que 1, atualiza o produto no array
        }
    }else{
        produtos.push(produto);
        //Se não achar produtos, adiciona no array
    }
    localStorage.setItem("produtos", JSON.stringify(produtos));
    //Coloca o array no localStorage

}

function Carregar_carrinho(){

    var total = 0;
    var produtos = localStorage.getItem("produtos");
    //Pega os produtos do localStorage
    if(produtos){

        $.each(JSON.parse(produtos), function( index, value ) {
            //Se tiver produtos, para cada produto cria o html abaixo
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
            //total é a ssoma do preço vezes a quantidade
            $("#div-produtos").append(div);
            //Jogando o html na div onde o id é igual a div-produtos
        }); 
    }
    $("#total").html("<b>Total: R$<span id='valor-total'>" + total + "</span></b>");
    //Colocando o total no html onde o id é igual a total
}

function Produto_Excluir(idproduto){
    var produtos = JSON.parse(localStorage.getItem("produtos"));
    //Pega os produtos do localStorage
    
    var idx = produtos.findIndex(
        function(item){
            return item.id == idproduto;
        }
    );
    //Acha o index do produto que vai ser excluido
    
    var total = parseInt($("#valor-total").html());
    //Pega o total da compra e coloca na variavel total
    
    var total_att = total - parseInt(produtos[idx].preco) * parseInt(produtos[idx].qtd);
    //Atualizando o total para subtrair o valor do produto excluido
    $("#total").html("<b>Total: R$<span id='valor-total'>" + total_att + "</span></b>");
    //Atualizando o total no html
    
    produtos.splice(idx , 1);
    //Excluindo o produto do array
    localStorage.setItem("produtos", JSON.stringify(produtos));
    //Atualizando o localStorage com o novo array
    $(`#div-carrinho-${idproduto}`).remove(); 
    //excluindo as divs referentes ao produto excluido
}

function Confirmar_exclusao(idproduto){
    var resposta = confirm("Tem certeza que deseja remover do carrinho?");
    //Jogando a reposta de confirmação numa variavel
    if (resposta == true) {
        Produto_Excluir(idproduto);
        //Se a resporta for verdadeira chamar a função Produto_Excluir
    } else {
        return false;
        //Se não for verdadeira retorna false
    }
}

function Get_qtd_produtos(){
    var produtos = JSON.parse(localStorage.getItem("produtos"));
    //Pegando os produtos do localStorage
    $.each(produtos, function( index, value ) {
        $("#preco-" + value.id).html(value.qtd);
    });
    //Para cada produto, atualiza a quantidade na tela
}

function CheckForm(form){
    //Function para checar se a a senha está igual ao confirmar senha

    var senha= form_cliente.Senha.value;
    //Jogando o que o usuario escreveu no campo da senha numa variável
    var Confirma= form_cliente.Confirmar.value;
    //Jogando o que o usuario escreveu no campo de confirmação numa variável

    if(senha != Confirma){
        alert("SENHAS DIFERENTES !");
        form_cliente.Senha.focus();
        return false;
        //Se a senha for diferente do confirmar senha da um alerta de senhas diferentes e coloca o foco no campo da senha e retorna falso para o submit
    }

    if (!CheckCPF(form)){
        form_cliente.CPF.focus();
        return false;
        //Se a function de checar o cpf for falsa, coloca o foco no campo do cpf e retorna falso para o submit
    }

    return true;
    //Se tudo estiver checado e correto retorna true para o submit
}

function CheckCPF(form){
    //Function para checar o cpf
    var cpf = form_cliente.CPF.value.replace(/([.]|[-])/gi,'');
    //Váriavel com o que o usuario escreveu no campo do cpf e retirando os "." e "-" do número
    var soma = 0;
    var resto =0;
    var d1 = 0;
    var d2 = 0;
    //Váriaveis que serão utilizadas

    if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
        alert ("CPF inválido!");
        return false;
        //Se o cpf for igual a todos os números iguais alerta que o cpf é inválido e retorna false para o submit
    }

    for (i=1; i<=9; i++){
        soma += parseInt(cpf.substring(i-1,i)) * (11-i);
        //Loop de 1 até 9 onde a variável soma é igual a substring do número do contador i menos 1 até i, vezes 11 menos o contador i
    }
    resto = soma % 11;
    //Váriavel resto é igual ao resto da divisão da soma por 11
    if ((resto == 0) || (resto == 1)){
        d1 = 0;
        //Se o resto for 0 ou 1 então o primeiro dígito depois do "-" do cpf é igual a 0
    }else{
        d1 = 11 - resto;
        //Se não o primeiro digito é igual a 11 - o resto
    }
    if (cpf.substring(9,10) != d1){
        alert("CPF inválido!")
        return false
        //Se o primeiro digito depois do "-" for diferente da váriavel d1 então alerta que o cpf é inválido e retorna false para o submit
    }
    soma = 0;
    //Zerando a váriavel soma
    for (i=1; i<=10; i++){
        soma += parseInt(cpf.substring(i-1,i)) * (12-i);
        //Loop de 1 até 10 onde a variável soma é igual a substring do número do contador i menos 1 até i, vezes 12 menos o contador i
    }
    resto = soma % 11;
    //Váriavel resto é igual ao resto da divisão da soma por 11
    if ((resto == 0) || (resto == 1)){
        d2 = 0;
        //Se o resto for 0 ou 1 então o segundo dígito depois do "-" do cpf é igual a 0
    }else{
        d2 = 11 - resto;
        //Se não o segundo digito é igual a 11 - o resto
    }
    if (cpf.substring(10,11) != d2){
        alert ("CPF inválido!");
        return false;
        //Se o segundodigito depois do "-" for diferente da váriavel d2 então alerta que o cpf é inválido e retorna false para o submit        
    }
    return true;
    //Se tudo estiver correto retorna true para o submit
}

function MenuActive(){
    $('.nav-item').click(MenuActive);
    //Atribuindo a função MenuActive ao clicar no menu
    var index = document.URL.lastIndexOf("/") + 1;
    //Pegar o indice da string após a última barra do URL
    var menu = document.URL.substring(index);
    //Pegar a parte da String que tenha o nome da página a qual foi clicada
    var link = $('a[href="'+menu+'"]');
    //Pegando o valor do href
    link.parent().addClass("active");
    //Adiciona a classe active para o menu
}

function Alert_Login(){
    //Function para abrir o modal do login
    $("#modalLogin").modal('show');
    //Abrindo o modal do login
    alert("Faça o login para prosseguir");
    //Alerta para fazer o login para prosseguir
}


function AbrirModal(){
    //Function para abrir o modal do login
    $("#modalLogin").modal('show');
    //Abrindo o modal do login
}

function Excluir(idproduto){
    $('#idproduto').val(idproduto);
    //Atribuindo o id do produto para submeter o formulário
    document.getElementById("form_produto").submit();
    //Submetendo o formulário
}
function Confirmar_exclusao_adm(idproduto){
    var resposta = confirm("Tem certeza que deseja excluir o produto?");
    //Colocando a mensagem de confirmação na variavel
    if (resposta == true) {
        Excluir(idproduto);
        //Se a resposta for verdadeira chamar a função excluir
    } else {
        return false;
        //Se não for verdadeira, retorna false
    }
}

function goBack() {
    window.history.back();
    //Function para fazer o botão de voltar
}

function Ende_selecionado(select){
    $("#inputRua").val($(select).find(':selected').data('rua'));
    $("#inputNum").val($(select).find(':selected').data('num'));
    $("#inputBairro").val($(select).find(':selected').data('bairro'));
    $("#inputCEP").val($(select).find(':selected').data('cep'));
    $("#inputComp").val($(select).find(':selected').data('comp'));
    //Quando o usário clicar em um valor do select atualiza os inputs para os valores do endereço cadastrados
}

function troco(select){
    if($(select).find(':selected').data('troco') == 1){
        $('#divTroco').show();
        //Se o valor do select selecionado for igual a 1, mostrar a div do troco na tela
    }else{
        $('#divTroco').hide();
        //Se o valor não for igual a 1, esconder a div do troco
    }
}

function Finalizar_compra(){

    var arr_produtos = [];
    //Declarando um array
    var produtos = localStorage.getItem("produtos");
    //Buscando os produtos no localStorage

    arr_data = {
        produtos: produtos,
        forma_pagamento: $("#inputPagamento").val(),
        endereco: $("#inputEndereco").val(),
        troco: $('#inputTroco').val()
    };
    //Criando um array com os parâmetros necessários para finalizar a compra

    $.ajax({
        url: "Finalizar_compra.php",
        type: "post",
        data: {
            'action': "exec_find",
            'data': arr_data
        },
        success: function(result) {
            localStorage.clear();
            window.location.href = "Detalhes.php";
        },
        error: function(log) {
            // handle error
        }
    });
    //Fazendo uma chamada ajax, acionando o php Finalizar_compra.php com os parâmetros do formulário e ao retornar sucesso redirecionando pro Detalhes.php
} 



