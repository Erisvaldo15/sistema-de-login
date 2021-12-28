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
       <div id="popup">
           <header id="header">
             <a class="close" onclick="popupToggle();"> <img src="../assets/cancel.png" alt="Icone para Sair"> </a>
           </header>
           <div id="container"> <!--- Modal --->
               <img src="../assets/email.png" alt="Icone de um Email">
               <div class="title">
                  <h2> Resgate Sua senha </h2>
               </div>
               <div class="text">
                  <p id="message"> Digite logo abaixo o seu e-mail e a nova senha que você deseja que faça parte de sua conta. </p>
               </div>
               <form action="" method="post">
                 <div class="input-box">
                     <input type="email" name="mail" id="email" placeholder="Enter email">
                     <input type="password" name="password" id="password" placeholder="Enter New Password">
                 </div>
                 <div id="button">
                    <button type="submit" name="reset_password" class="reset"> CHANGE PASSWORD </button>
                 </div>
               </form>
          </div>
       </div>
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
           <a id="btn" class="btn" onclick="popupToggle();"> Resgatar Conta </a>
        </form>
      </div> 
     <footer> <h5> © Erisvaldo Silva </h5> </footer>
    </main>
  <script src="../js/modal.js"> </script>
</body>
</html>