<?php

namespace app\database;

use PDO;

class Connection {

    private static ?PDO $pdoConnection = null; 

    public static function connection() {
        
        if(!self::$pdoConnection) {
            self::$pdoConnection = new PDO("{$_ENV['DATABASE_DRIVER']}:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']}",$_ENV['DATABASE_USER'],
            $_ENV['DATABASE_PASSWORD']);
        }

        return self::$pdoConnection;
    }

}
