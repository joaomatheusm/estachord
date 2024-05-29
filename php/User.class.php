<?php

class User {
    public function login($username, $password) {
        global $pdo;

        $sql = "SELECT * FROM users WHERE name = :name AND password = :password";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("name", $username);
        $sql->bindValue("password", md5($password));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['idUser'] = $dado['user_id'];
            return true;
        } else {
            return false;
        }
    }
}

?>
