<?php require_once 'conexao.php'; 
//puxando a conexão do banco de dados
?>


<?php 
session_start();
//inicia uma nova sessão ou resume uma sessão existente

$idfuncionario = $_POST['Nome'];
//Pegando o nome selecinado do select e jogando na variavel idfuncionario
$idperfil = $_POST['Perfil'];
//Pegando o perfil selecinado do select e jogando na variavel idperfil

$sql = "UPDATE funcionario SET idperfil = '$idperfil' WHERE idfuncionario = '$idfuncionario'";
//Atualizando a tabela funcionario settando o idperfil para o perfil que o administrador selecionou onde o id do funcionario for igual ao id do funcionario que o administrador selecionou

$resultado = mysqli_query(GetMysql(),$sql);
//executa uma consulta no banco de dados. O que esta função faz é criar um array que representa a linha do dado retornado do banco de dados. 



if($resultado){
    $_SESSION['msg_func'] = "Perfil alterado com sucesso!";
    //se o resultado for verdadeiro joga uma mensagem na session falando que o perfil foi alterado com sucesso
}else{
    echo "Erro" ;
    //se o resultado for falso exibe uma mensagem de erro

}

header("Location: ".$_SERVER['HTTP_REFERER']);
//Retronando o usuario para a página onde ele estava 

?>