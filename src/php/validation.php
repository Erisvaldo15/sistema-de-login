<?php

session_start();

include_once "function_database.php";
include_once "conexao.php";

$mail = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRIPPED);

if(isset($_POST['login'])) {

    if(empty($mail) || empty($password)) {
        $msg = "Por favor, preencha todos os campos.";
        return;
    }

    if(!autenticar($mail)->rowCount()) {
        $msg = "Seu E-mail não existe, cadastre-se por favor!";
        return;
    }

    $result = autenticar($mail)->fetchObject();
    $passVerify = password_verify($password, $result->password); 

    if(!$passVerify) {
        $msg = "Senha Errada!";
        return;
    }

    $NewUser = str_replace(['@','gmail.com','outlook.com', '_', '-', '.'], "", $mail);
    $NewUser = preg_replace("/[0-9]/", "", $NewUser); 
    
    $_SESSION['key'] = $NewUser;
    header("location: painel_usuario.php");
}

if(isset($_POST['register'])) {
    
    if(empty($mail) || empty($password)) {
        $msg = "Preencha todos os campos!";
        return;
    }

    if(autenticar($mail)->rowCount()) {
        $msg = "E-mail já existente";
        return;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $saveRegister = register($mail, $passwordHash);

    if($saveRegister) {
        $msg = "Cadastro efetuado com sucesso!";
        return;
    }

}

if(isset($_POST['reset_password'])) {

    if(empty($mail) || empty($password)) {
        $msg = "Preencha todos os campos";
        return;
    }

    if(!autenticar($mail)->rowCount()) {
        $msg = "Seu E-mail não existe!";
        return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    reset_password($mail, $password); 
    
}


