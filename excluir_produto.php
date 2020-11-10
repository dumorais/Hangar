<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>

<?php
session_start();
//inicia uma nova sessão ou resume uma sessão existente

$idproduto = $_POST['idproduto'];
//Colocando o id do produto numa variável

$sql = "DELETE FROM produtos WHERE idproduto = $idproduto";
//Excluindo da tabela produtos onde o id do produto foi igual o id do produto que o administrador selecionou

$resultado=mysqli_query(GetMysql(),$sql);
//executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 


if($resultado){
    $_SESSION['msg_excluir'] = "Produto excluido com sucesso!";
    //Se o resultado for verdadeiro joga uma mensagem na session dizendo que o produto foi excluido
}

header("Location: ".$_SERVER['HTTP_REFERER']);
//redireciona o administrador para a página onde ele estava

?>