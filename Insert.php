<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>

<?php
session_start();
//inicia uma nova sessão ou resume uma sessão existente

$produto = $_POST['NomeProd'];
$categoria = $_POST['Categoria'];
$preco = $_POST['Preco'];
$imagem = $_POST['Imagem'];
$descr = $_POST['Descr'];
//Colocando os dados do produto que o administrador digitou nas variáveis

$sql = "INSERT INTO produtos (idcategoria, produto, preco, imagen, descr) VALUE ('$categoria', '$produto', '$preco', '$imagem', '$descr')";
//inserindo na tabela prou=dutos os dados que o administrador digitou

$resultado=mysqli_query(GetMysql(),$sql);
//executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 

if ($resultado) {
    $_SESSION['msg_prod'] = "Produto cadastrado com sucesso!";
    //Se o resultado for verdadeiro joga uma mensagem na session dizendo que o produto foi cadastrado

} else {
    echo "Erro" ;
    //se não exibe uma mensagem de erro
}

header("Location: CadastrarProd.php");
//redirecionando o administrador para a página CadastrarProd.php


?>