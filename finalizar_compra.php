<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>

<?php 
session_start();
//inicia uma nova sessão ou resume uma sessão existente


$date = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
//Pegando a data e a hora no servidor

$sql = "INSERT INTO pedido (idusuario, idendereco, idpagamento, troco, horario) VALUE ('" . $_SESSION['idusuario'] . "', '" . $_POST['data']['endereco'] . "', '" . $_POST['data']['forma_pagamento'] . "', '" . $_POST['data']['troco'] . "', '" . $date->format('Y-m-d H:i:s') . "')";
//Inserindo na tabela pedido o id do usuario, o id do endereço, o id do pagamento, o troco e o horario do usuário que fez o pedido

$conn = GetMysql();
//Colocando a conexão com o banco na variável conn

if ($conn->query($sql) === TRUE) {
    //Executando a query e vendo se ela é verdadeira
    $idpedido = $conn->insert_id; 
    //Pegando o último id inserido na tabela
    foreach (json_decode($_POST['data']['produtos'], true) as &$produto) {
        $sql = "INSERT INTO pedido_produto (idpedido,idproduto, quantidade, preco) VALUE ('" . $idpedido . "', '" . $produto['id'] . "','" . $produto['qtd'] . "', '" . $produto['preco'] . "')";
        //Pra todos os produtos que estão no POST insere na tabela pedido_produto
        $conn->query($sql);
        //Executando o insert
    }
    $_SESSION['idpedido'] = $idpedido;
    $_SESSION['msg'] = "Compra finalizada!";
    //Se for verdadeiro coloca o id do pedido na session e joga uma mensagem na session dizendo que a compra foi finalizada
    
} else {
   echo "<script> alert('Erro ao finalizar compra!');</script>";
    //Se não exibe uma mensagem de erro
} 



?>