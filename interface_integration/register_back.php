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

Usuario::create($connection, $nome, $cpf, $dataNasc, $senha);
// Conta::create($connection, $id, 'rand(10000,99999)', 0010, 0);
header('Location: ../interface/index.php');
?>