<?php

namespace app\controllers;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PainelUserController extends ModelController
{

    public function index(Request $request, Response $response)
    {
        if (!$_SESSION['user']) return redirect("/", $response);

        view('user', [
            "title" => "Welcome",
            "user" => $_SESSION['user']['name'],
            "data" => $this->data,
        ]);
       
        return $response;
    }

    public function destroy(Request $request, Response $response)
    {
        unset($_SESSION['user']);
        return redirect("/", $response);
    }
}
