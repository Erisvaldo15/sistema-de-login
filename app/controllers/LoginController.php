<?php

namespace app\controllers;

use app\classes\Message;
use app\classes\PersistedData;
use app\classes\Validation;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController extends ModelController
{

    public function index(Request $request, Response $response)
    {

        view('login', [
            "title" => "Login",
        ]);

        return $response;
    }

    public function store(Request $request, Response $response)
    {

        $data = [
            "email" => "e",
            "password" => "p",
        ];

        $validated = Validation::validate($data);

        if (isset($_SESSION['messages'])) {
            return redirect($_SERVER['HTTP_REFERER']);
        }

        $findBy = $this->select->findBy('users', 'email', $validated['email']);

        if (!$findBy) {
            Message::set('email', 'Email not found');
            PersistedData::set("email", $validated['email']);
            return redirect("/");
        }

        if (!password_verify($validated['password'], $findBy[0]->password)) {
            Message::set('password', 'Password not found');
            PersistedData::set("password", $validated['password']);
            return redirect('/');
        }

        $_SESSION['user'] = [
            "name" => $findBy[0]->name,
        ];

        return redirect('/user');
    }
}
