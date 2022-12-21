

<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="stylesheet" href="../css/extrato.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        require_once '../dbmanager/connectdb.php';
        require_once '../models/Conta.class.php';
        require_once '../models/Transferencia.class.php';
        require_once "../models/Usuario.class.php";

        session_start();

        $idConta = $_SESSION['idConta'];
        
        $idUsuario = $_SESSION['login'];
        $usuario = Usuario::get($connection, $idUsuario);
        $conta = Conta::get($connection, $idConta);
        
    ?>
    <div class="black-effect"></div>
    <div class="background-im"><img src="../assets/images/gta-money-1366x768.png" alt="background-im"></div>
    <div class="side-bar">
        <div class="logo-container">
            <span class="logo" id="CJ">CJ</span>
            <span class="logo" id="bank">Bank</span>
        </div>
        
        <div class="options">
            <a href="./dashboard.php" style="text-decoration: none; color: black;">
                <div class="option-item">
                    <div class="option-label">
                        <img src="../assets/images/sidebar-images/Home.png" alt="label"></img>
                        <span>Home</span>
                    </div>
                </div>
            </a>
            <div class="option-item pixModal">
                <div class="option-label">
                    <img src="../assets/images/sidebar-images/Money Circulation.png" alt="label"></img>
                    <span>Transferências</span>
                </div>
            </div>
            <div class="option-item">
                <div class="option-label">
                    <img src="../assets/images/sidebar-images/Get Cash.png" alt="label"></img>
                    <span>Pagamentos</span>
                </div>
            </div>
            <div class="option-item">
                <div class="option-label">
                    <img src="../assets/images/sidebar-images/Prepaid Recharge.png" alt="label"></img>
                    <span>Recargas</span>
                </div>
            </div>
            <div class="option-item">
                <div class="option-label">
                    <img src="../assets/images/sidebar-images/Money Bag.png" alt="label"></img>
                    <span>Empréstimo</span>
                </div>
            </div>
            <div class="option-item">
                <div class="option-label">
                    <img src="../assets/images/sidebar-images/Investment.png" alt="label"></img>
                    <span>Investimento</span>
                </div>
            </div>
            <div class="option-item">
                <div class="option-label">
                    <img src="../assets/images/sidebar-images/Wallet.png" alt="label"></img>
                    <span>Cartões</span>
                </div>
            </div>

            <div class="option-item">
                <div class="option-label">
                    <img src="../assets/images/sidebar-images/Services.png" alt="label"></img>
                    <span>Serviços</span></div>
                </div>
        </div>
    </div>

    <div class="header">
        <span class="avatar"></span>
        <div class="dados">
            <span class="nome"><?php echo $usuario->nome ?></span>
            <span class="agencia">Agência: <?php echo $conta->agencia?></span>
            <span class="conta">Conta: <?php echo $conta->numeroConta?></span>
        </div>

        <div class="icones-menu">
            <img src="../assets/images/menu-icons/Settings.png" alt="config">
            <img src="../assets/images/menu-icons/Help.png" alt="config">
            <a href="index.php"><img src="../assets/images/menu-icons/Logout.png" alt="config"></a>
        </div>
    </div>

    <div class="main">
        <div class="card-main">
            <h2 id="card-title">Extrato</h2>
            <div class="header-card">
                <h2 id="transaction">Transação</h2>
                <h2 id="name">Nome</h2>
                <h2 id="acount">Conta</h2>
                <h2 id="value">Valor</h2>
            </div>
            <div class="content-container">
                <?php
                
                $transferencias = Transferencia::getAll($connection, $idConta);
                
                foreach ($transferencias as $transf) {
                    $enviado = ($transf->remetente == $idConta);
                    if ($enviado) {
                        $idUsuario = Conta::buscaUsuarioPorIdConta($connection, $transf->destinatario);
                        $outra_conta = Conta::get($connection,$transf->destinatario);
                    }
                    else{
                        $idUsuario = Conta::buscaUsuarioPorIdConta($connection, $transf->remetente);
                        $outra_conta = Conta::get($connection,$transf->remetente);
                    }

                    $us = Usuario::get($connection, $idUsuario);
                
                ?>
                <div class="content-card">
                    <h2 class="content-type">
                    <?php
                        if ($enviado) {
                            echo 'Enviado';
                        } else {
                            echo 'Recebido';
                        }
                    ?>
                    </h2>
                    <h2 class="content-name"><?php echo $us->nome?></h2>
                    <div class="acount-container">
                        <h2 class="ag-acount">AG: <?php echo $outra_conta->agencia?></h2>
                        <h2 class="cc-acount">CC: <?php echo $outra_conta->numeroConta?></h2>
                    </div>

                    <h2 class="content-value <?php
                        echo !$enviado? 'positive' : 'negative';
                    ?> "> <?php if ($enviado) {
                        echo '-';
                    } else {
                        echo '+';
                    }?>R$ <?php echo $transf->valor?></h2>
                </div>

                <?php } ?>
            </div>
        </div>
        </div>
    </div>
</body>
</html>