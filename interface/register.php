<!DOCTYPE html>
<html lang="pt">
<head>
    <link href="../css/register.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CJBANK</title>
</head>
<body>
    <div class="background-im">
        <img src="../assets/images/gta-money-1366x768.png" alt="background-im">
    </div>

    <?php
    require_once "../dbmanager/connectdb.php";
    require_once "../models/Usuario.class.php";
    $usuario = new Usuario($nome, $cpf, $dataNascimento, $senha);

    ?>

    <div class="registerContainer">
        <div class="logoContainer">
            <span class="CJBank">CJBank</span>
        </div>
        <div class="titleContainer">
            <span class="title">Crie sua conta</span>
            <span id="subTitle">CJBank deixa sua vida mais fácil como se fosse um jogo.</span>
        </div>

<<<<<<< HEAD
        <form method="POST" action="../interface_integration/register_back.php" onsubmit="validForm()">
=======
        <form method="POST" autocomplete="off" action="../interface_integration/register_back.php" onsubmit="validForm()">
>>>>>>> integracao

            <div class="formsContainer" onsubmit="">
                <div class="inputForms">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="<?php echo $usuario->cpf ?? ''; ?>">
                </div>
                <div class="inputForms">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value=" <?php echo $usuario->nome ?? ''; ?>">
                </div>

                <div class="inputForms">
                    <label for="login">Data de nascimento</label>
                    <input type="date" id="dataNasc" name="dataNasc" value="<?php echo $usuario->dataNascimento ?? ''; ?>">
                </div>
                <div class="inputForms">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" value="<?php echo $usuario->senha ?? '';?>">
                </div>
            </div>
            <div class="submitContainer">
                <button type="submit" class="submit">Criar conta</button>
            </div>
        </form>

        <?php
        ?>

        <a href="./index.html" class="loginBack">
            <h2 >Você ja é cliente? Faça login.</h2>
        </a>
    </div>    

</body>
</html>