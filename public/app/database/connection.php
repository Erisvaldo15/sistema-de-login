<?php

class Connection {

    public static function connection() {

        try {
            
            return new PDO("mysql:host=localhost; dbname=contas", "root", "",
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]
              );
    
        } catch(PDOException $exe) {
            echo "<p> Mensagem de erro: <small> {$exe->getMessage()} </small> </p>";
        }
    
    }

}
