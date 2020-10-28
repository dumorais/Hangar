<?php require_once 'conexao.php'; ?>

<?php 
session_start();


$date = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
$sql = "INSERT INTO pedido (idusuario, idendereco, idpagamento, troco, horario) VALUE ('" . $_SESSION['idusuario'] . "', '" . $_POST['data']['endereco'] . "', '" . $_POST['data']['forma_pagamento'] . "', '" . $_POST['data']['troco'] . "', '" . $date->format('Y-m-d H:i:s') . "')";
//$resultado=mysqli_query(GetMysql(),$sql);

$retorno = "Compra finalizada!";
$conn = GetMysql();
if ($conn->query($sql) === TRUE) {
    $idpedido = $conn->insert_id; 
    foreach (json_decode($_POST['data']['produtos'], true) as &$produto) {
        $sql = "INSERT INTO pedido_produto (idpedido,idproduto, quantidade, preco) VALUE ('" . $idpedido . "', '" . $produto['id'] . "','" . $produto['qtd'] . "', '" . $produto['preco'] . "')";
        $conn->query($sql);
    }
    $retorno = "Compra finalizada!";
} else {
    $retorno = "Erro ao finalizar compra.";
} 

echo json_encode($retorno);

?>