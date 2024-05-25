<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstaChord</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div id="background"></div>
    <div class="container">
        <div class="logo">
            <a href="../index.php">
                <img src="../img/logo-branco.png" alt="" width="200px"> <!-- Diminuir a imagem original depois -->
            </a>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Nome de usuário" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <a href="#">Esqueceu sua senha?</a>
            <div class="row button">
                <input type="submit" value="Login">
            </div>
            <div class="signup-link">Ainda não possui uma conta?<br><a href="signup.php">Registre-se agora</a></div>
        </form>
    </div>
</body>

</html>



