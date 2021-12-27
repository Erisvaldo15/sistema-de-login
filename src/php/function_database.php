<?php

function autenticar($mail) {  
    
    $connection = connect();
    $comandoSQL = $connection->prepare("SELECT * FROM usuarios WHERE email = :mail");
    $comandoSQL->bindValue(':mail', $mail);
    $comandoSQL->execute();

    return $comandoSQL; 
}

function register($mail, $password) {

    $connection = connect();
    $comandoSQL = $connection->prepare('INSERT INTO usuarios(email, password) VALUES(:mail, :password)');
    $comandoSQL->bindParam(':mail', $mail);
    $comandoSQL->bindParam(':password', $password);
    $comandoSQL->execute();

    return $connection->lastInsertId(); 
}

function reset_password($mail, $password) {
    $connection = connect();
    $comandoSQL = $connection->prepare("UPDATE usuarios SET password = :password WHERE email = :mail");
    $comandoSQL->bindParam(':mail', $mail);
    $comandoSQL->bindParam(':password', $password);
    $comandoSQL->execute();

    return $comandoSQL;
}