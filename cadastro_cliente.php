<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>

<?php
session_start();
//inicia uma nova sessão ou resume uma sessão existente

$Nome = $_POST['Nome'];
$CPF = $_POST['CPF'];
$Email = $_POST['Email'];
$Telefone = $_POST['Telefone'];
$Dtnasc = $_POST['Dtnasc'];
$Login = $_POST['Login'];
$Senha = $_POST['Senha'];
//Pegando os dados que o cliente digitou e colocando em variáveis



$sql2 = "SELECT login, idusuario FROM usuario WHERE login = '$Login'";
//Selecionando o login e o id do usuario da tabela usuario onde o login for igual ao login que ele digitou

$resultado2=mysqli_query(GetMysql(),$sql2);
//executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 


if($resultado2){
    //vendo se o resultado é verdadeiiro

    $row_usuario = mysqli_fetch_assoc($resultado2);
    // retorna uma matriz associativa representando a próxima linha no conjunto de resultados representado pelo parâmetro resultado2 , aonde cada chave representa o nome de uma coluna do conjunto de resultados.

    if($Login == $row_usuario['login']){
        $_SESSION['msg_cad'] = "Já existe este login, tente outro!";
        //se o login que o usuario digitou for igual o login que está cadastrado ele joga uma mensagem na session dizendo que já existe o login
    } else{
        //se ainda não existir o login 
        $sql = "INSERT INTO usuario (nome, telefone, email, Dtnasc, cpf, login, senha) VALUE ('$Nome', '$Telefone', '$Email', '$Dtnasc', '$CPF', '$Login', '$Senha')";
        //insere na tabela usuario os dados digitados pelo usuario

        $resultado=mysqli_query(GetMysql(),$sql);
        //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 


        if ($resultado) {
            //se o resultado for verdadeiro

            $query = mysqli_query(GetMysql(),$sql2);
            //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. Agora com o sql2

            $usuario_cadastrado = mysqli_fetch_assoc($query);
            // retorna uma matriz associativa representando a próxima linha no conjunto de resultados representado pelo parâmetro resultado2 , aonde cada chave representa o nome de uma coluna do conjunto de resultados.


            $_SESSION['idusuario'] = $usuario_cadastrado['idusuario'];
            //Colocando o id do usuario cadastrado na session
        } else {
            echo "Erro" ;
        }
    }
}
header ("Location: cadastro_endereço.php")
    //redirecionando o usuario para a pagina cadastro_endereco.php



?>