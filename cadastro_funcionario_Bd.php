<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>

<?php
session_start();
//inicia uma nova sessão ou resume uma sessão existente

$Nome = $_POST['Nome'];
$CPF = $_POST['cpf'];
$Email = $_POST['Email'];
$Cargo = $_POST['Cargo'];
$Login = $_POST['Login'];
$Senha = $_POST['Senha'];
$Perfil = $_POST['Perfil'];
//Colocando os dados digitados pelo administrador nas variáveis


$sql2 = "( SELECT login FROM `funcionario` WHERE login = '$Login' ) UNION ALL ( select login from usuario where login = '$Login' )";
//  combinando os resultados de duas consultas ppara ver se o login que o administrador digitou já existe tanto na tabela de fucnionários quanto na tavela de usuários

$resultado2=mysqli_query(GetMysql(),$sql2);
//executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 


if($resultado2){
    //se o resultado for verdadeiro

    $row_usuario = mysqli_fetch_assoc($resultado2);
    // retorna uma matriz associativa representando a próxima linha no conjunto de resultados representado pelo parâmetro resultado2 , aonde cada chave representa o nome de uma coluna do conjunto de resultados.

    if($Login == $row_usuario['login']){
        $_SESSION['msg_func'] = "Já existe este login, tente outro!";
        //se o login que o administrador registrou for igual um login cadastrado joga uma mensagem na session falando que já existe este login
    } else{

        $sql = "INSERT INTO funcionario (nome, idperfil, cpf, email, cargo, login, senha) VALUE ('$Nome', '$Perfil', '$CPF', '$Email', '$Cargo', '$Login', '$Senha')";
        //se não tiver insere os dados digitados pelo administrador na tabela funiconario
        
        $resultado=mysqli_query(GetMysql(),$sql);
        //executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 


        if ($resultado) {
            $_SESSION['msg_func'] = "Funcionário cadastrado!";
            //se o resultado for verdadeiro joga uma mensagem na session dizendo que o funcionário foi cadastrado
        } else {
            echo "Erro" ;
            //se não exibe uma mensagem de erro
        }
    }
}


header("Location: ".$_SERVER['HTTP_REFERER']);
//redireciona o administrador para a página em que ele estava

?>