<?php

namespace app\database;

use PDO;
use PDOException;

class Select extends Model {

    public function findBy(string $table, string $field, string $value, string $fields = "*"): array {

        try {
 
             $findBy = $this->connection->prepare("SELECT {$fields} FROM {$table} WHERE {$field} = :{$field}");
             $findBy->bindValue(":{$field}", $value);
             $findBy->execute();
 
             return $findBy->fetchAll(PDO::FETCH_OBJ);
        }
 
        catch(PDOException $e) {
             echo "<span> {$e->getMessage()} </span>";
        }
    }
}