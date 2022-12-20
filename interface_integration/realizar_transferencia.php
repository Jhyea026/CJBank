
<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>

<?php

    require_once "../dbmanager/connectdb.php";
    require_once "../models/Conta.class.php";
    
    session_start();
    $agenciaDestino = $_POST['agenciaDestino'];
    $numContaDestino = $_POST['contaDestino'];
    $contaDestino = Conta::buscarContaPorAgenciaeNumero($connection, $agenciaDestino, $numContaDestino);
    $valor = $_POST['valor'];
    $contaRemetente = $_SESSION['idConta'];

    Conta::realizarTransferencia($connection, $contaRemetente, $contaDestino, $valor);
    header("Location: ../interface/dashboard.php");
?>