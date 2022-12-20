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

$userId = Usuario::create($connection, $nome, $cpf, $dataNasc, $senha);
$numeros_conta_digitos = rand(1000,9999);
$numero_conta_verif = rand(0,9);
Conta::create($connection, $userId, 1100, "$numeros_conta_digitos"."-"."$numero_conta_verif", 0);
header('Location: ../interface/index.php');
?>