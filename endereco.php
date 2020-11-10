<<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>

<?php 
session_start();
//inicia uma nova sessão ou resume uma sessão existente

$Rua = $_POST['Rua'];
$Numero = $_POST['num'];
$Bairro = $_POST['Bairro'];
$Cep = $_POST['CEP'];
$Complemento = $_POST['Complemento'];
//Colocando os dados que o usuário digitou nas variáveis

$sql = "INSERT INTO endereco (rua, numero, bairro, complemento, cep, idusuario) VALUE ('$Rua', '$Numero', '$Bairro', '$Complemento', '$Cep', ".$_SESSION['idusuario'].")";
//inserindo na tabela endereco os dados que o usuario digitou

$resultado=mysqli_query(GetMysql(),$sql);
//executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 

if ($resultado){
    $_SESSION['msg_endereco'] = "Endereço cadastrado!";
    //Se o resultado for verdadeiro joga uma mensagem na session dizendo que o endereço foi cadastrado
}else{
    echo "Erro";
    //se não exibe uma mensagem de erro
}

header ("Location: carrinho.php");
//redireciona o usuario para a página carrinho.php

?>