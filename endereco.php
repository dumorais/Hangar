<?php require_once 'conexao.php'; ?>

<?php 
session_start();

$Rua = $_POST['Rua'];
$Numero = $_POST['num'];
$Bairro = $_POST['Bairro'];
$Cep = $_POST['CEP'];
$Complemento = $_POST['Complemento'];

$sql = "INSERT INTO endereco (rua, numero, bairro, complemento, cep, idusuario) VALUE ('$Rua', '$Numero', '$Bairro', '$Complemento', '$Cep', ".$_SESSION['idusuario'].")";
$resultado=mysqli_query(GetMysql(),$sql);

    if ($resultado){
        $_SESSION['msg_endereco'] = "Endereço cadastrado!";
    }else{
        echo "Erro";
    }
    
    header ("Location: carrinho.php");

?>