<?php

namespace app\controllers;

use app\classes\Validation;
use app\classes\Message;
use app\classes\PersistedData;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RegisterController extends ModelController {

    public function index(Request $request, Response $response) {

        view('register', [
            "title" => "Register",
        ]);

        return $response;
    }

    public function store() {
        
        $data = [
            "name" => "t",
            "email" => "e",
            "password" => "p",
            "confirm-password" => "cp",
        ];

        $validated = Validation::validate($data);

        if($validated['confirm-password'] !== $validated['password']) {
            Message::set("confirm-password", "Passwords not are equal");
            PersistedData::set('confirm-password', $validated['confirm-password']);
            return redirect('/register');
        } 
        
        if(!empty($_SESSION['messages'])) {  
            return redirect($_SERVER['HTTP_REFERER']);
        }

        if($this->select->findBy('users', 'email', $validated['email'])) {
            Message::set('email', 'E-Mail already exists');
            PersistedData::set("email", $validated['email']);
            return redirect('/register');
        }

        unset($validated['confirm-password']);

        $sanitize = Validation::sanitize($validated);

        if($this->insert->insert('users', $sanitize)) {
            return redirect('/');
        }

    }

}