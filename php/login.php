<?php

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    require 'connection.php';
    require 'User.class.php';

    $u = new User();
    
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    if ($u->login($username, $password) == true) {
        if(isset($_SESSION['idUser'])) {
            header("Location: ../index.html");
        } else {
            header("Location: ../pages/login-page.html");
        }
    } else {
        header("Location: ../pages/login-page.html");
    }
} else {
    header("Location: ../pages/login-page.html");
}

?>
