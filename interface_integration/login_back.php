<?php

    require_once '../dbmanager/connectdb.php';
    require_once '../models/Usuario.class.php';

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $user = Usuario::buscarUsuario($connection, $login, $senha);

    if ($user) {
        setcookie('usuario', $user);
        header('Location: ../interface/dashboard.php');
    }
?>