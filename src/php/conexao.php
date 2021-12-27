<?php

function connect() {
 
    try {
        return new PDO("mysql:host=localhost; dbname=contas", "root", "",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]
          );

    } 
    
    catch(PDOException $exception) {
        echo "<p> Mensagem de erro: <small> {$exception->getMessage()} </small> </p>";
    }
    
}

