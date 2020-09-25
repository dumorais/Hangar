<?php
session_start();

unset( $_SESSION['login'], $_SESSION['nome'], $_SESSION['categoria']);

header("Location: ".$_SERVER['HTTP_REFERER']);

?>