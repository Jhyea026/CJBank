
<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>

<?php

    require_once "../dbmanager/connectdb.php";
    require_once "../models/Conta.class.php";
    require_once "../models/Transferencia.class.php";

    session_start();
    $agenciaDestino = $_POST['agenciaDestino'];
    $numContaDestino = $_POST['contaDestino'];
    $contaDestino = Conta::buscarContaPorAgenciaeNumero($connection, $agenciaDestino, $numContaDestino);
    $valor = $_POST['valor'];
    $contaRemetente = $_SESSION['idConta'];

    echo date('m-d-Y');
    Transferencia::create($connection, $contaRemetente, date('Y-m-d'), $valor, $contaRemetente, $contaDestino);
    Transferencia::create($connection, $contaDestino, date('Y-m-d'), $valor, $contaDestino, $contaRemetente);
    
    Conta::realizarTransferencia($connection, $contaRemetente, $contaDestino, $valor);
    header("Location: ../interface/dashboard.php");
?>