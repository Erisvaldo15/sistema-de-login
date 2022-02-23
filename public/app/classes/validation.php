<?php

include_once "../helper/config.php";

class Validation {

    public static function verifyFields($email, $password): User {

        if(empty($email) || empty($password)) {
            message("Preencha todos os campos.");
            exit();
        }

        if(strlen($password) < 6) {
            message("Sua senha precisa ter no mínimo 6 caracteres...");
            exit();
        } 

        return new User($email, $password);
    }

    public static function verifySession(): bool {

        if(empty($_SESSION['key'])) {
            header("location: ../../");
            return false;
        }

        return true;
    }

}