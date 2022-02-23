<?php

session_start();

ini_set("display_errors", 1);
error_reporting(E_ALL);

include_once "../classes/user.php";
include_once "../classes/validation.php";
include_once "../helper/config.php";

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

if(isset($_POST['login'])) {

    $user = Validation::verifyFields($email, $password);

    if(!empty($user->getMessage())) {
        message($user->getMessage());
    }

    $user->logInto($email);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Perfil</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body> 
    <?php if(!Validation::verifySession()): ?>
        <p> <?= $_SESSION['key']; ?> </p>
    <?php endif; ?>
    <a href="logout.php"> Sair da Conta </a>
</body>
</html>