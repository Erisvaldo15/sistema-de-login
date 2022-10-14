<?php

namespace app\classes;

class PersistedData {

    public static function get(string $key) {

        if(isset($_SESSION['persistedData'][$key])) {

            $flash = $_SESSION['persistedData'][$key];
            unset($_SESSION['persistedData'][$key]);

            return $flash;
        }

    }

    public static function set(string $key, string $message) {

        if(!isset($_SESSION['persistedData'][$key])) {
            $_SESSION['persistedData'][$key] = $message;
        }
        
    }

}

