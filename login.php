<?php require_once 'conexao.php'; ?>

<?php 
session_start();

$Login = $_POST['Login'];
$Senha = $_POST['Senha'];

$sql = "SELECT login, senha, nome FROM usuario WHERE login = '$Login' AND senha = '$Senha'";

$resultado=mysqli_query(GetMysql(),$sql);
 $row_usuario = mysqli_fetch_assoc($resultado);

if($row_usuario['login']){
    
        $_SESSION['login'] = $row_usuario['login'];
        $_SESSION['nome'] = $row_usuario['nome'];
    
}else{
    $sql_func = "SELECT login, senha, nome, idperfil FROM funcionario WHERE login = '$Login' AND senha = '$Senha'";
    $resultado_func=mysqli_query(GetMysql(),$sql_func);
     $row_usuario = mysqli_fetch_assoc($resultado_func);
    
    if($row_usuario['login']){
     
            $_SESSION['login'] = $row_usuario['login'];
            $_SESSION['nome'] = $row_usuario['nome'];
            $_SESSION['perfil'] = $row_usuario['idperfil'];

    }else{

        $_SESSION['msg_login'] = "Login ou senha incorretos!";
    }
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>