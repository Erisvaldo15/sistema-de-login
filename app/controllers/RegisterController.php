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
            "confirm-password" => "cp",
        ];

        $validated = Validation::validate($data);

        if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {
            return $response->withHeader("Location", $_SERVER['HTTP_REFERER'])->withStatus(302);
        }

        if ($validated["confirm-password"] !== $validated["password"]) {
            Message::set("confirm-password", "Passwords not are equal");
            PersistedData::set("confirm-password", $validated["confirm-password"]);
            return redirect("/register", $response);
        }

        if (!empty($_SESSION["messages"])) {
            return redirect($_SERVER["HTTP_REFERER"], $response);
        }

        if ($this->select->findBy("users", "email", $validated["email"])) {
            Message::set("email", "E-mail already exists");
            PersistedData::set("email", $validated["email"]);
            return redirect("/register", $response);
        }

        unset($validated["confirm-password"]);

        $sanitize = Validation::sanitize($validated);

        if ($this->insert->insert("users", $sanitize)) {
            return redirect("/", $response);
        }
    }
}