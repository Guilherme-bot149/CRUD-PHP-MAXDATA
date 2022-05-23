<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="Assets/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" type="text/css" href="Assets/style-login.css">
    <title>Login</title>
</head>
<body>
    <img class="bg-wave" src="Assets/wave.png">
    <div class="container">
        <div class="login-content">
            <form action="config/logar.php" method="POST">
                <img src="Assets/logo_colorida.png">
                <h2 class="title">Bem-Vindo a MaxData Sistemas</h2>
                <p>informe seu login e senha para prosseguir</p>
                <p>User:<span style="color: red;"> maxdata </span> | Senha: <span style="color: red;"> max5699 </span></p>
                <hr>

                <?php
                    if(isset($_SESSION['nao_autenticado'])):
                ?>
                    <p style="color: red;">ERRO: Usuario ou senha invalidos.</p>
                <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                ?>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuário</h5>
                        <input name="usuario" type="usuario" class="input" required>
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Senha</h5>
                        <input name="senha" type="password" class="input" required>
                    </div>
                </div>
                <input type="submit" value="Entrar" class="submit" id="submit">
            </form>
        </div>
    </div>
    <script src="js/main-login.js"></script>
</body>
</html>