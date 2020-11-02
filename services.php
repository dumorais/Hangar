<?php require_once 'conexao.php'; ?>

<?php
//
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

function GetEnde(){
    $sql = "SELECT rua, numero, bairro, complemento, cep, idendereco FROM endereco WHERE idusuario = '" . $_SESSION['idusuario'] . "'";
    $resultado=mysqli_query(GetMysql(), $sql);
    return $resultado;
}

function GetPedido(){
    $sql = "SELECT produto, pp.preco, quantidade FROM `pedido_produto` pp INNER JOIN produtos p ON p.idproduto = pp.idproduto WHERE idpedido = '" . $_SESSION['idpedido'] . "'";
    
    $sql2 = "SELECT rua, numero, bairro, complemento, cep, horario, (SELECT SUM(preco) FROM pedido_produto pp WHERE pp.idpedido = p.idpedido) as total FROM `pedido` p INNER JOIN endereco e ON p.idendereco = e.idendereco WHERE idpedido = '" . $_SESSION['idpedido'] . "'";
    
    $resultado['produtos']=mysqli_query(GetMysql(), $sql);
    $resultado['pedido']=mysqli_query(GetMysql(), $sql2);
    return $resultado;
}

?>