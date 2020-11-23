<?php
session_start();
//inicia uma nova sessão ou resume uma sessão existente

unset( $_SESSION['login'], $_SESSION['nome'], $_SESSION['perfil']);
//Destruindo as Sessions Login, Nome e perfil


header("Location: ".$_SERVER['HTTP_REFERER']);
//Redirecionando o usuário para a página onde ele estava

?>