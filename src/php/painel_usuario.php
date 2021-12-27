<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Perfil</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            flex-direction: column; 
        }
    </style>
</head>
<body>
    <h1> <?php echo $_SESSION['key']; ?> </h1> 
    <a href="logout.php"> Sair da Conta</a>
</body>
</html>