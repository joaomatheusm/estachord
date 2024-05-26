<?php
// Código exageradamente comentado propositalmente para estudo

// Define a classe User
class User {
    // Define o método de login da classe User
    public function login($username, $password) {
        // Obtém a variável global $pdo que representa a conexão PDO com o banco de dados
        global $pdo;

        // Consulta SQL para selecionar um usuário com o nome de usuário e senha fornecidos
        $sql = "SELECT * FROM users WHERE name = :name AND password = :password";
        // Prepara a consulta SQL para execução
        $sql = $pdo->prepare($sql);
        // Associa os valores dos parâmetros da consulta SQL aos valores fornecidos
        $sql->bindValue("name", $username);
        $sql->bindValue("password", md5($password)); // A senha é convertida para hash MD5 antes da comparação
        // Executa a consulta SQL
        $sql->execute();

        // Verifica se a consulta retornou algum resultado (ou seja, se o login foi bem-sucedido)
        if ($sql->rowCount() > 0) {
            // Se o login foi bem-sucedido, obtém os dados do usuário
            $dado = $sql->fetch();

            // Armazena o ID do usuário na sessão PHP
            $_SESSION['idUser'] = $dado['user_id'];

            // Retorna verdadeiro para indicar que o login foi bem-sucedido
            return true;
        } else {
            // Se o login não foi bem-sucedido (nenhuma linha retornada), retorna falso
            return false;
        }
    }
}

?>
