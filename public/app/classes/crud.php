<?php

include_once "../database/connection.php";


class Crud {

    public function authenticate_user($email) {     

         $connection = Connection::connection();
         $comandoSQL = $connection->prepare("SELECT * FROM usuarios WHERE email = :email");
         $comandoSQL->bindValue(':email', $this->email = $email);
         $comandoSQL->execute();

         return $comandoSQL; 
    }    

    public function register_user($email, $password) {

        $connection = Connection::connection();
        $comandoSQL = $connection->prepare('INSERT INTO usuarios(email, senha) VALUES(:email, :password)');
        $comandoSQL->bindParam(':email', $email);
        $comandoSQL->bindParam(':password', $password);
        $comandoSQL->execute();
    
        return $connection->lastInsertId(); 
    }

    public function reset_password($email, $password) {
      
        $connection = Connection::connection();
        $comandoSQL = $connection->prepare("UPDATE usuarios SET password = :password WHERE email = :email");
        $comandoSQL->bindParam(':email', $email);
        $comandoSQL->bindParam(':password', $password);
        $comandoSQL->execute();
    
        return $comandoSQL; 
    }

}