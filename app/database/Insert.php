<?php

namespace app\database;

use PDOException;

class Insert extends Model {

    public function insert(string $table, array|object $data) {

        try {

            $query = "INSERT INTO {$table} (";
            $values = "VALUES (";

            foreach ($data as $key => $value) {
                $query .= "$key,";   
                $values .= ":{$key},";  
            }

            $query = rtrim($query, ',');
            $values = rtrim($values, ',');

            $query .= ") ";
            $values .= ")";

            $insert = $this->connection->prepare($query.$values);

            foreach ($data as $key => $value) {

                if($key == 'password') {
                    $insert->bindValue(":$key", password_hash($value, PASSWORD_DEFAULT));
                } else {
                    $insert->bindValue(":$key", $value);
                }

            }

            return $insert->execute();
        }

        catch(PDOException $e) {
            echo "{$e->getMessage()}, in line: {$e->getLine()}";
        }

    }

}