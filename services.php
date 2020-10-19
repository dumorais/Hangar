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

function GetPerfil(){
    $sql = "SELECT idperfil, descr FROM funcionario_perfil";
    $resultado=mysqli_query(GetMysql(), $sql);
    return $resultado;
}

function GetFunc(){
    $sql = "SELECT nome, idfuncionario FROM funcionario";
    $resultado=mysqli_query(GetMysql(), $sql);
    return $resultado;
}

function GetPag(){
    $sql = "SELECT formapagamento, idpagamento FROM pagamento";
    $resultado=mysqli_query(GetMysql(), $sql);
    return $resultado;
}

?>