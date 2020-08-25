<?php require_once 'conexao.php'; ?>

<?php
$produto = $_POST['NomeProd'];
$categoria = $_POST['Categoria'];
$preco = $_POST['Preco'];
$imagem = $_POST['Imagem'];
$descr = $_POST['Descr'];

$sql = "INSERT INTO produtos (idcategoria, produto, preco, imagen, descr) VALUE ('$categoria', '$produto', '$preco', '$imagem', '$descr')";
$resultado=mysqli_query(GetMysql(),$sql);

if ($resultado) {
    echo "<script> alert ('Cadastrado com sucesso'); </script>";
} else {
    echo "Erro" ;
}

header("Location: CadastrarProd.php");


?>