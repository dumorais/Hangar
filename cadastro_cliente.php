<?php require_once 'conexao.php'; ?>

<?php
$Nome = $_POST['Nome'];
$CPF = $_POST['CPF'];
$Email = $_POST['Email'];
$Telefone = $_POST['Telefone'];
$Dtnasc = $_POST['Dtnasc'];
$Login = $_POST['Login'];
$Senha = $_POST['Senha'];

$sql = "INSERT INTO usuario (nome, telefone, email, Dtnasc, cpf, login, senha) VALUE ('$Nome', '$Telefone', '$Email', '$Dtnasc', '$CPF', '$Login', '$Senha')";
$resultado=mysqli_query(GetMysql(),$sql);

if ($resultado) {
    echo "<script> alert ('Cadastrado com sucesso'); </script>";
} else {
    echo "Erro" ;
}

header("Location: cadastro.php");

?>