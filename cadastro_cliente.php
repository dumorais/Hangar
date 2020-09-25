<?php require_once 'conexao.php'; ?>

<?php
session_start();
$Nome = $_POST['Nome'];
$CPF = $_POST['CPF'];
$Email = $_POST['Email'];
$Telefone = $_POST['Telefone'];
$Dtnasc = $_POST['Dtnasc'];
$Login = $_POST['Login'];
$Senha = $_POST['Senha'];


$sql2 = "SELECT login FROM usuario WHERE login = '$Login'";
$resultado2=mysqli_query(GetMysql(),$sql2);

if($resultado2){
    $row_usuario = mysqli_fetch_assoc($resultado2);
    
    if($Login == $row_usuario['login']){
         $_SESSION['msg_cad'] = "Já existe este login, tente outro!";
    } else{

        $sql = "INSERT INTO usuario (nome, telefone, email, Dtnasc, cpf, login, senha) VALUE ('$Nome', '$Telefone', '$Email', '$Dtnasc', '$CPF', '$Login', '$Senha')";
        $resultado=mysqli_query(GetMysql(),$sql);

        if ($resultado) {
            echo "<script> alert ('Cadastrado com sucesso'); </script>";
        } else {
            echo "Erro" ;
        }
    }
}
//var_dump($_SESSION); die;

    header("Location: cadastro.php");

?>