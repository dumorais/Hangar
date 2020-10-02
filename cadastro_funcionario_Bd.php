<?php require_once 'conexao.php'; ?>

<?php
session_start();
$Nome = $_POST['Nome'];
$CPF = $_POST['cpf'];
$Email = $_POST['Email'];
$Cargo = $_POST['Cargo'];
$Login = $_POST['Login'];
$Senha = $_POST['Senha'];
$Perfil = $_POST['Perfil'];


$sql2 = "SELECT login FROM funcionario WHERE login = '$Login'";
$resultado2=mysqli_query(GetMysql(),$sql2);

if($resultado2){
    $row_usuario = mysqli_fetch_assoc($resultado2);
    
    if($Login == $row_usuario['login']){
         $_SESSION['msg_cad'] = "Já existe este login, tente outro!";
    } else{

        $sql = "INSERT INTO funcionario (nome, idperfil, cpf, email, cargo, login, senha) VALUE ('$Nome', '$Perfil', '$CPF', '$Email', '$Cargo', '$Login', '$Senha')";
        $resultado=mysqli_query(GetMysql(),$sql);

        if ($resultado) {
            echo "<script> alert ('Cadastrado com sucesso'); </script>";
        } else {
            echo "Erro" ;
        }
    }
}


    header("Location: ".$_SERVER['HTTP_REFERER']);

?>