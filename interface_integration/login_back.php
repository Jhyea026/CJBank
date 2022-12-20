
<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>

<?php

    require_once '../dbmanager/connectdb.php';
    require_once '../models/Usuario.class.php';
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if ($login != '' && $senha != '') {

    $logId = Usuario::buscarUsuario($connection, $login, $senha);

    if ($logId) {
        session_start();
        $_SESSION['login'] = $logId;
        header('Location: ../interface/dashboard.php');
    }
}
?>  