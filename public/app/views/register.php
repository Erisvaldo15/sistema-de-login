<?php

session_start();

ini_set("display_errors", 1);
error_reporting(E_ALL);

include_once "../helper/config.php";
include_once "../classes/user.php";
include_once "../classes/validation.php";

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

if(isset($_POST['register'])) {
    
    $user = Validation::verifyFields($email, $password);

    if(!empty($user->getMessage())) {
        message($user->getMessage());
        exit();
    }

    $user->getRegister();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <main>
       <header>
           <div class="text">
                <h1 class="title"> Register </h1>
           </div>
       </header>
       <div class="container">
           <form action="" method="post" class="form">
               <input type="text" name="email" class="campos" placeholder="E-mail ou Username"> 
               <input type="password" name="password" class="campos" placeholder="Senha">
               <button type="submit" class="btn" name="register"> Cadastrar </button>
               <a href="../../index.php" class="anchor" id="home"> Já possui cadastro? Faça o seu login </a>
           </form>
        </div> 
    </main>
    <?php if(!empty($msg)): ?> <p> $msg; </p> <?php endif; ?>
</body>
</html>
