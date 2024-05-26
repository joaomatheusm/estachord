<?php
// Código exageradamente comentado propositalmente para estudo

// Inicia uma sessão PHP
session_start();

// Configurações de conexão com o banco de dados
$localhost = "localhost"; // Endereço do servidor MySQL
$user = "root"; // Nome de usuário do MySQL
$passw = ""; // Senha do MySQL (neste caso, vazio)
$database = "estachord"; // Nome do banco de dados a ser utilizado

// Declaração da variável global $pdo para armazenar a conexão PDO
global $pdo;

// Tentativa de estabelecer uma conexão com o banco de dados
try {
    // Cria uma nova instância da classe PDO para conexão com o MySQL
    $pdo = new PDO("mysql:dbname=".$database."; host=".$localhost, $user, $passw);
    // Define o modo de erro da conexão para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se ocorrer um erro durante a conexão, exibe a mensagem de erro
    echo "ERRO: ".$e->getMessage();
    // Encerra a execução do script
    exit;
}

?>