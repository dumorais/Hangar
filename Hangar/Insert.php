<?php require_once 'conexao.php'; ?>

<?php
session_start();
$produto = $_POST['NomeProd'];
$categoria = $_POST['Categoria'];
$preco = $_POST['Preco'];
$imagem = $_POST['Imagem'];
$descr = $_POST['Descr'];

$sql = "INSERT INTO produtos (idcategoria, produto, preco, imagen, descr) VALUE ('$categoria', '$produto', '$preco', '$imagem', '$descr')";
$resultado=mysqli_query(GetMysql(),$sql);

if ($resultado) {
   $_SESSION['msg_prod'] = "Produto cadastrado com sucesso!";
} else {
    echo "Erro" ;
}

header("Location: CadastrarProd.php");


?>