<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

$msg = filter_input(INPUT_GET, "mensagem", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <title>Página Inicial</title>
</head>
<body>
    <main>
         <?php include_once "app/views/modal_resetPassword.php"; ?>
         <header>
              <div class="text">
                 <h1 class="title"> <a href="./"> Login </a>  </h1>
              </div>
         </header>
         <div class="container">
              <form action="app/views/painel_usuario.php" method="post" class="form">
                  <input type="email" name="email" class="campos" placeholder="E-mail ou Username"> 
                  <input type="password" name="password" class="campos" placeholder="Senha">
                  <button type="submit" class="btn" name="login"> Enviar </button>
                  <button type="button" id="btn" class="btn" onclick="popupToggle();"> Resgatar Conta </button>
              </form>
         <p> <?php if(!empty($msg)): ?> <?= $msg; ?> <?php endif; ?> </p>
         <?php ?>
         <p> <a class="anchor" href="app/views/register.php"> Cadastra-se </a> </p>
         </div> 
   </main>
  <footer> <h5> © Erisvaldo Silva </h5> </footer>
  <script src="assets/js/modal.js"> </script>
</body>
</html>