<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>

<?php 
session_start();
//inicia uma nova sessão ou resume uma sessão existente

$Login = $_POST['Login'];
$Senha = $_POST['Senha'];
//Colocando o login e a senha digitados pelo usuário nas variáveis

$sql = "SELECT login, senha, nome, idusuario FROM usuario WHERE login = '$Login' AND senha = '$Senha'";
//Selecionando o login, a senha, o nome e o id do usuario da tabela usuario onde o login da tabela for igual ao que ele digitou e a senha também

$resultado=mysqli_query(GetMysql(),$sql);
//executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 

$row_usuario = mysqli_fetch_assoc($resultado);
// retorna uma matriz associativa representando a próxima linha no conjunto de resultados representado pelo parâmetro resultado2 , aonde cada chave representa o nome de uma coluna do conjunto de resultados.

if($row_usuario['login']){

    $_SESSION['login'] = $row_usuario['login'];
    $_SESSION['nome'] = $row_usuario['nome'];
    $_SESSION['idusuario'] = $row_usuario['idusuario'];
    //Se o login for verdadeiro coloca os dados do usuário nas sessions

}else{

    $sql_func = "SELECT login, senha, nome, idperfil FROM funcionario WHERE login = '$Login' AND senha = '$Senha'";
    //Se não seleciona o login, a senha, o nome e o id do perfil dos funcionarios da tabela funcionario onde o login da tabela for igual ao que ele digitou e a senha também

    $resultado_func=mysqli_query(GetMysql(),$sql_func);
    //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 

    $row_usuario = mysqli_fetch_assoc($resultado_func);
    // retorna uma matriz associativa representando a próxima linha no conjunto de resultados representado pelo parâmetro resultado2 , aonde cada chave representa o nome de uma coluna do conjunto de resultados.

    if($row_usuario['login']){

        $_SESSION['login'] = $row_usuario['login'];
        $_SESSION['nome'] = $row_usuario['nome'];
        $_SESSION['perfil'] = $row_usuario['idperfil'];
        //Se o login for verdadeiro coloca os dados do funcionario nas sessions

    }else{
        $_SESSION['msg_login'] = "Login ou senha incorretos!";
        //Se não joga uma mensagem na session dizendo que o login ou a senha estão incorretos
    }
}
header("Location: ".$_SERVER['HTTP_REFERER']);
//Redireciona o usuário para a página em que ele estava
?>