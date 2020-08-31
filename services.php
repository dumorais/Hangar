<?php require_once 'conexao.php'; ?>

<?php

function GetProdutos($idcategoria){
    $sql = "SELECT * FROM `produtos` WHERE idcategoria = $idcategoria ";
    $resultado=mysqli_query(GetMysql(), $sql);
    return $resultado;
}

function GetCategorias(){
    $sql = "SELECT idcategoria, descr FROM produto_categoria";
    $resultado=mysqli_query(GetMysql(), $sql);
    return $resultado;
}


?>