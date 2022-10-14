<?php

namespace app\database;

use PDO;
use PDOException;

class Connection {

    public static function connection() {

        try {
            
            return new PDO("mysql:host={$_ENV['DATABASE_HOST']}; dbname={$_ENV['DATABASE_NAME']}; 
            charset={$_ENV['DATABASE_CHARSET']}", "{$_ENV['DATABASE_USER']}", "{$_ENV['DATABASE_PASSWORD']}");
    
        } catch(PDOException $exe) {
            echo "<p> Mensagem de erro: <small> {$exe->getMessage()} </small> </p>";
        }
    
    }

}
