<?php
session_start();

unset( $_SESSION['login'], $_SESSION['nome'], $_SESSION['perfil']);
$_SESSION['msg'] = "Faça o login para finalizar a compra!";

header("Location: ".$_SERVER['HTTP_REFERER']);

?>