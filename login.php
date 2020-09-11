<?php require_once 'conexao.php'; ?>

<?php 
session_start();

$Login = $_POST['Login'];
$Senha = $_POST['Senha'];

$sql = "SELECT login, senha, nome, categoria FROM usuario WHERE login = '$Login'";
$resultado=mysqli_query(GetMysql(),$sql);

if($resultado){
    $row_usuario = mysqli_fetch_assoc($resultado);
    if(($Senha==$row_usuario['senha'])){
        $_SESSION['login'] = $row_usuario['login'];
        $_SESSION['nome'] = $row_usuario['nome'];
         $_SESSION['categoria'] = $row_usuario['categoria'];




    }else{
       $_SESSION['msg_login'] = "Login ou senha incorretos!";

    }
          header("Location: ".$_SERVER['HTTP_REFERER']);

}

?>