<?php require_once 'conexao.php'; ?>

<?php 
session_start();
$idfuncionario = $_POST['Nome'];
$idperfil = $_POST['Perfil'];

$sql = "UPDATE funcionario SET idperfil = '$idperfil' WHERE idfuncionario = '$idfuncionario'";

$resultado = mysqli_query(GetMysql(),$sql);

    if($resultado){
        $_SESSION['msg_func'] = "Perfil alterado com sucesso!";
    }else{
         echo "Erro" ;
    }

    header("Location: ".$_SERVER['HTTP_REFERER']);

?>