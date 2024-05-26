<?php
// Código exageradamente comentado propositalmente para estudo

// Verifica se as variáveis de formulário 'username' e 'password' estão definidas e não estão vazias
if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    // Inclui o arquivo de conexão com o banco de dados
    require 'connection.php';
    // Inclui a definição da classe User
    require 'User.class.php';

    // Instancia um novo objeto da classe User
    $u = new User();
    
    // Obtém e escapa os valores dos campos de formulário 'username' e 'password'
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    // Verifica se o login é bem-sucedido chamando o método login da classe User
    if ($u->login($username, $password) == true) {
        // Se o login for bem-sucedido e o usuário estiver autenticado
        if(isset($_SESSION['idUser'])) {
            // Redireciona para a página inicial
            header("Location: ../index.html");
        } else {
            // Se o usuário não estiver autenticado, redireciona para a página de login
            header("Location: ../pages/login-page.html");
        }
    } else {
        // Se o login não for bem-sucedido, redireciona para a página de login
        header("Location: ../pages/login-page.html");
    }
} else {
    // Se os campos de formulário 'username' ou 'password' estiverem vazios, redireciona para a página de login
    header("Location: ../pages/login-page.html");
}

?>
