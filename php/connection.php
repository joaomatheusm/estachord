<?php

session_start();

$localhost = "localhost";
$user = "root"; 
$passw = "";
$database = "estachord"; 

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=".$database."; host=".$localhost, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}

?>