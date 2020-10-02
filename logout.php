<?php
session_start();

unset( $_SESSION['login'], $_SESSION['nome'], $_SESSION['perfil']);

header("Location: ".$_SERVER['HTTP_REFERER']);

?>