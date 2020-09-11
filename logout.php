<?php
session_start();

unset( $_SESSION['login'], $_SESSION['nome']);

header("Location: ".$_SERVER['HTTP_REFERER']);

?>