<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>


<?php

function GetProdutos($idcategoria){
    //function para pegar os produtos cadastrados no banco
    $sql = "SELECT * FROM `produtos` WHERE idcategoria = $idcategoria ";
    //Selecionando os produtos da tabela onde o idcategoria for igual a categoria que estou passando lá no cardápio
    $resultado=mysqli_query(GetMysql(), $sql);
    //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 
    return $resultado;
    //retornando a query com os resultados puxados da tabela
}

function GetCategorias(){
    //function para pegar as categorias dos produtos cadastrados no banco
    $sql = "SELECT idcategoria, descr FROM produto_categoria";
    //Selecinando o id da categoria e a descrição do mesmo da tabela produto_categoria
    $resultado=mysqli_query(GetMysql(), $sql);
    //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 
    return $resultado;
    //retornando a query com os resultados puxados da tabela
}

function GetPerfil(){
    //function para pegar os perfis de funcionários cadastrados no banco
    $sql = "SELECT idperfil, descr FROM funcionario_perfil";
    //Selecionando o id do perfil e a descrição do mesmo ta tabela funcionario_perfil
    $resultado=mysqli_query(GetMysql(), $sql);
    //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 
    return $resultado;
    //retornando a query com os resultados puxados da tabela
}

function GetFunc(){
    //function para pegar o nome e o id dos funcionarios cadastrados no banco
    $sql = "SELECT nome, idfuncionario FROM funcionario";
    //Selecionando o nome e o id do funcionario da tabela funcionario
    $resultado=mysqli_query(GetMysql(), $sql);
    //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 
    return $resultado;
    //retornando a query com os resultados puxados da tabela
}

function GetPag(){
    //function para pegar as formas de pagamento cadastradas no banco
    $sql = "SELECT formapagamento, idpagamento FROM pagamento";
    //Selecionando a forma de pagamento e o id da mesma da tabela pagamento
    $resultado=mysqli_query(GetMysql(), $sql);
    //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 
    return $resultado;
    //retornando a query com os resultados puxados da tabela
}

function GetEnde(){
    //function para pegar os endereços cadastrados no banco
    $sql = "SELECT rua, numero, bairro, complemento, cep, idendereco FROM endereco WHERE idusuario = '" . $_SESSION['idusuario'] . "'";
    //Selcionando a rua, o numero, o bairro, o complemento, o cep e o id do endereço onde o id do usuario for igual o id que o usuario fez o login
    $resultado=mysqli_query(GetMysql(), $sql);
    //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 
    return $resultado;
    //retornando a query com os resultados puxados da tabela
}

function GetPedido(){
    //function para pegar os produtos e o endereço em que foi pedido os produtos
    $sql = "SELECT produto, pp.preco, quantidade FROM `pedido_produto` pp INNER JOIN produtos p ON p.idproduto = pp.idproduto WHERE idpedido = '" . $_SESSION['idpedido'] . "'";
    //Selecionando o produto, o preço e a quantidade de produtos que o usuário pediu, juntando com a tabela dos produtos onde o id do produto da tabela pedido_produto for igual o id do produto da tabela produtos

    $sql2 = "SELECT rua, numero, bairro, complemento, cep, horario, (SELECT SUM(preco) FROM pedido_produto pp WHERE pp.idpedido = p.idpedido) as total FROM `pedido` p INNER JOIN endereco e ON p.idendereco = e.idendereco WHERE idpedido = '" . $_SESSION['idpedido'] . "'";
    //Selecionando o endereço da tabela pedido juntando com a tabela endereco onde o id do endereço da tabela pedido for igual o id do endereço cadastrado na tabela endereco onde o id do pedido for igual ao id do pedido que ele acabou de fazer e criando um total do pedido pegando o preço do produto e somando

    $resultado['produtos']=mysqli_query(GetMysql(), $sql);
    //Fazendo a query dos produtos
    $resultado['pedido']=mysqli_query(GetMysql(), $sql2);
    //fazendo a query do pedido
    return $resultado;
    //retornando a query com os resultados puxados da tabela
}

?>