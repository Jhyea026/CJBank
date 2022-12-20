
<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>

<?php
    require_once "../dbmanager/connectdb.php";
    require_once "../models/Conta.class.php";

    session_start();
    $addSaldo = $_POST['input-value'];
    
    $idConta = $_SESSION['idConta'];

    Conta::adicionarSaldo($connection, $idConta, $addSaldo);

    header("Location:../interface/dashboard.php");
?>