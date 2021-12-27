<?php

include_once "validation.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Página Inicial</title>
</head>
<body>
    <main>
      <header>
        <div class="text">
            <h1 class="title"> Login </h1>
        </div>
      </header>
      <div class="container">
        <form action="" method="post" class="form">
           <input type="text" name="mail" class="campos" placeholder="E-mail ou Username"> 
           <input type="text" name="password" class="campos" placeholder="Senha">
           <button type="submit" class="btn" name="login"> Enviar </button>
           <button type="submit" class="btn" name="register"> Cadastrar </button>
           <button type="submit" name="reset_password" class="btn"> Resgatar Conta </button>
           <?php if(!empty($msg)): ?> <p> <?= $msg ?> </p> <?php endif; ?>
        </form>
      </div> 
     <footer> <h5> © Erisvaldo Silva </h5> </footer>
    </main>
</body>
</html>