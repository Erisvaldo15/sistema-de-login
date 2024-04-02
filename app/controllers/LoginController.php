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

        if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {
            return $response->withHeader("Location", $_SERVER['HTTP_REFERER'])->withStatus(302);
        }

        $findBy = $this->select->findBy('users', 'email', $validated['email']);

        if (!$findBy) {
            Message::set('email', 'Email not found');
            PersistedData::set("email", $validated['email']);
            return $response->withHeader("Location", '/')->withStatus(302);
        }

        if (!password_verify($validated['password'], $findBy[0]->password)) {
            Message::set('password', 'Password not found');
            PersistedData::set("password", $validated['password']);
            return $response->withHeader("Location", '/')->withStatus(302);
        }

        $_SESSION['user'] = [
            "name" => $findBy[0]->name,
        ];

        return $response->withHeader("Location", '/user')->withStatus(302);
    }
}
