<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>

<?php

require_once '../dbmanager/connectdb.php';
include_once '../models/Usuario.class.php';
include_once '../models/Conta.class.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$dataNasc = $_POST['dataNasc'];
$senha = $_POST['senha'];

$id = Usuario::create($connection, $nome, $cpf, $dataNasc, $senha);
$number_account_digits = rand(1000, 9999);
$number_account_verif = rand(0, 9);

Conta::create($connection, $id, '1010', "$number_account_digits-$number_account_verif", 0);
header('Location: ../interface/index.php');
?>