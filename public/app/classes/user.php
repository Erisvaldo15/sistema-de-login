<?php

include_once "../helper/config.php";
include_once "../classes/crud.php";

class User {

    private $msg;

    public function  __construct(private $email, private $password) {
        $this->setEmail($this->email);
        $this->setPassword($this->password);
    }

    private function setEmail($email) {
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
            $_SESSION['id'] = $this->email;
            return;
        }

        $this->msg = "E-mail inválido!";

    }

    private function setPassword($password) {
        $password = htmlspecialchars($password);
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getMessage(): string {
       return "{$this->msg}";
    }

    public function getRegister() {
        return $this->setRegister();
    }

    public function logInto($email) {

        $crud = new Crud();

        if(!$crud->authenticate_user($email)->rowCount()) {
            message("E-mail não encontrado, cadastre-se por favor!");
            exit();
        }

        $result = $crud->authenticate_user($email)->fetchObject();
        $passVerify = password_verify($this->password, $result->password); 

        if(!$passVerify) {
            message("Senha incorreta!");
            exit();
        }

        $NewUser = str_replace(['@','gmail.com','outlook.com', '_', '-', '.'], "", $email);
        $NewUser = preg_replace("/[0-9]/", "", $NewUser); 
    
        $_SESSION['key'] = $NewUser;
        // $this->filterMail($this->mail);
    }

    private function setRegister() {

        $crud = new Crud();

        if($crud->authenticate_user($this->email)->rowCount()) {
            message("E-mail já existente!");
            exit();
        }
        

        $crud->register_user($this->email, $this->password);
        message("Cadastro Realizado com sucesso");
          // Porque aqui não funciona com um If????  
    }
  
}