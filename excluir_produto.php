<?php require_once 'conexao.php'; ?>

<?php
session_start();

$idproduto = $_POST['idproduto'];

$sql = "DELETE FROM produtos WHERE idproduto = $idproduto";
$resultado=mysqli_query(GetMysql(),$sql);

if($resultado){
    $_SESSION['msg_excluir'] = "Produto excluido com sucesso!";
}

header("Location: ".$_SERVER['HTTP_REFERER']);

?>