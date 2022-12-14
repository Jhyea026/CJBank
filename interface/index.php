<!DOCTYPE html>
<html lang="pt">
<head>
    <link href="../css/index.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CJBANK</title>
</head>
<body>
    <div class="background-im">
        <img src="../assets/images/gta-money-1366x768.png" alt="background-im">
    </div>
    <div class="loginContainer">
        <span class="CJBank">CJBank</span>
        <span class="bem-vindo">Seja bem-vindo</span>
        <form id='formLogin' autocomplete="off" method="POST" action="../interface_integration/login_back.php" onsubmit="validForm()">
            <a id="login-form">
                
                <div class="inputLogin">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}">
                </div>

                <div class="inputSenha">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha">
                </div>

                <a><button class="submit" >Entrar</button></a>

                <a href="./register.php" class="registro">
                    <h2 >Não é cliente CJbank? Crie sua conta.</h2>
                </a>
        </form>
    </div>    

</body>
</html>