
<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>

<?php
session_start();
$login_cookie = $_SESSION["login"];
?>

<html lang="pt">
<head>
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="../JS/abrirModal.js" defer></script>
    <script src="../JS/saldoBotoes.js" defer></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 

        require_once "../dbmanager/connectdb.php";
        require_once "../models/Usuario.class.php";
        require_once "../models/Conta.class.php";

        $usuario = Usuario::get($connection,$login_cookie);
        $idConta = Conta::buscarContaPorUsuario($connection, $login_cookie);
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
            <div class="option-item">
                <div class="option-label">
                    <img src="../assets/images/sidebar-images/Receipt Dollar.png" alt="label"></img>
                    <span>Extrato</span>
                </div>
            </div>
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
            <span class="agencia">Agência: <?php echo $conta->agencia ?></span>
            <span class="conta">Conta: <?php echo $conta->numeroConta ?></span>
        </div>

        <div class="icones-menu">
            <img src="../assets/images/menu-icons/Settings.png" alt="config">
            <img src="../assets/images/menu-icons/Help.png" alt="config">
            <a href="index.html"><img src="../assets/images/menu-icons/Logout.png" alt="config"></a>
        </div>
    </div>

    <div class="main">

        <div class="card-flex">
            <div class="card saldo" id="open-modal">
                <span class="label-saldo">Saldo</span>
                <img src="../assets/images/card-icons/Cash.png" alt="Cash">
                <span class="saldo-val">R$ <?php echo number_format(floatval($conta->saldo), 2, '.', '');?></span>
            </div>

            <div id="fade" class="hide"></div>
            <div id="modal" class="hide">
                <div class="modal-header-container">
                    <h2 class="header-modal-text">Adicionar dinheiro</h2>
                </div>
                <div class="division-modal-container">
                    <hr class="division-modal-line-top"/>
                </div>
                <div class="modal-add-body">
                    <h2 id="add-title">Qual o valor que você deseja adicionar?</h2>
                   <div class="value-container">
                    <h2 id="text-value">Valor:</h2>
                    <form action="../interface_integration/adicionar_saldo.php" method="POST">
                        <input id="input-value" type="number" name="input-value" value="0">
                        <?php
                        $_SESSION['idConta'] = $idConta;
                        ?>
                        <button type="submit" id="add-money" >Adicionar</button>
                    </form>

                    </div> 
                    <div class="suggestions-container">
                        <div class="suggestions-text-container">
                            <h2 id="suggestions-text">Sugestões:</h2>
                        </div>
                        <div class="suggestions-buttons-container">

                        <button class="suggestions-buttons" value="5">+5</button>
                        <button class="suggestions-buttons" value="10">+10</button>
                        <button class="suggestions-buttons" value="20">+20</button>
                        <button class="suggestions-buttons" value="50">+50</button>
                            
                        </div>
                        
                    </div>
                </div>
                
                <div class="division-modal-container">
                    <hr class="division-modal-line-botton"/>
                </div>
                <div id="close-modal">Cancelar</div>
            </div>

            <div class="card pixModal">
                <div class="icon-label">
                    <img src="../assets/images/card-icons/Money Circulation.png" alt="pix">
                    <span>Pix</span>
                </div>
            </div>

            <div id="fade2" class="hide"></div>
            <div id="modal2" class="hide">
                <div class="modal-header-container">
                    <h2 class="header-modal-text">Transferência</h2>
                </div>
                <div class="division-modal-container">
                    <hr class="division-modal-line-top"/>
                </div>
                <div class="modal-transfer-body">
                    <h2 id="transfer-title">Para qual conta deseja transferir?</h2>
                    <div class="agcc-container">
                        <div class="ag-container">
                            <h2 id="ag-text">Agência:</h2>
                            <input id="ag-input"/>
                        </div>
                        <div class="cc-container">
                            <h2 id="cc-text">Conta:</h2>
                            <input id="cc-input"/>
                        </div>
                    </div>
                    <h2 id="value-transfer-title">Qual valor você deseja transfeir?</h2>
                    <div class="value-transfer-container">
                        <h2 id="value-text-transfer">Valor:</h2>
                        <input id="value-input-transfer"/>
                    </div>
                </div>
                <div class="division-modal-container">
                    <hr class="division-modal-line-botton"/>
                </div>
                <div id="transfer-money">Transferir</div>
                <div id="closePixModal">Cancelar</div>
            </div>

            <div class="card">
                <div class="icon-label">
                    <img src="../assets/images/card-icons/Get Cash.png" alt="pix">
                    <span>Pagamentos</span>
                </div>
            </div>

            <div class="card">
                <div class="icon-label">
                    <img src="../assets/images/card-icons/Receipt Dollar.png" alt="pix">
                    <span>Extrato</span>
                </div>
            </div>
        </div>

        <div class="credit">
            <span id="cartao-cred">Cartao de crédito</span>
            <span id="fatura-span">Fatura atual</span>
            <span id="fatura-val-span">R$ 0.00</span>
            <span id="limite-span">Limite disponível de R$ 0.00</span>
            <button>Fatura</button>
        </div>

        <div class="emprestimo">
            <span id="emp">Empréstimo</span>
            <span id="emp-atual">Não existe nenhum empréstimo no momento.</span>
            <span id="mark">CJBank tem as melhores propostas de empréstimo 
                para você e o seu negócio.</span>
            <button>Solicite o seu</button>
        </div>
    </div>
</body>
</html>