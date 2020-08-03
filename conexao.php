<?php



function GetMysql(){
    $conexao = mysqli_connect("localhost","root","","hangar")
    or die ("sem conexão");

    mysqli_set_charset($conexao,"utf8");
    return $conexao;
}

?>