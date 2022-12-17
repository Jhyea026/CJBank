<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="stylesheet" href="../css/dashboard.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
            <div class="option-item">
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
            <span class="nome">Carl Jhonson</span>
            <span class="agencia">Agência: 0001</span>
            <span class="conta">Conta: 1234-5</span>
        </div>

        <div class="icones-menu">
            <img src="../assets/images/menu-icons/Settings.png" alt="config">
            <img src="../assets/images/menu-icons/Help.png" alt="config">
            <a href="index.html"><img src="../assets/images/menu-icons/Logout.png" alt="config"></a>
        </div>
    </div>

    <div class="main">

        <div class="card-flex">
            <div class="card saldo">
                <span class="label-saldo">Saldo</span>
                <img src="../assets/images/card-icons/Cash.png" alt="Cash">
                <span class="saldo-val">R$ 0.00</span>
            </div>

            <div class="card">
                <div class="icon-label">
                    <img src="../assets/images/card-icons/Money Circulation.png" alt="pix">
                    <span>Pix</span>
                </div>
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