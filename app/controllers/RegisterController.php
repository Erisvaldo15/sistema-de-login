<?php

namespace app\controllers;

use app\classes\Validation;
use app\classes\Message;
use app\classes\PersistedData;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class RegisterController extends ModelController
{

    public function index(Request $request, Response $response)
    {
        view("register", [
            "title" => "Register",
        ]);

        return $response;
    }

    public function store(Request $request, Response $response)
    {
        $data = [
            "name" => "t",
            "email" => "e",
            "password" => "p",
            "confirmation_password" => "cp",
        ];

        $validated = Validation::validate($data);

        if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {
            return redirect($_SERVER["HTTP_REFERER"], $response);
        }

        if ($validated["confirmation_password"] !== $validated["password"]) {
            Message::set("confirmation_password", "Passwords are not equal");
            PersistedData::set("confirmation_password", $validated["confirmation_password"]);
            return redirect("/register", $response);
        }

        if ($this->select->findBy("users", "email", $validated["email"])) {
            Message::set("email", "E-mail already exist");
            PersistedData::set("email", $validated["email"]);
            return redirect("/register", $response);
        }

        unset($validated["confirmation_password"]);

        $sanitize = Validation::sanitize($validated);

        if ($this->insert->insert("users", $sanitize)) {
            return redirect("/", $response);
        }
    }
}