<?php

namespace app\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PainelUserController extends ModelController {

    public function index(Request $request, Response $response) {

        if(!$_SESSION['user']) {
            return redirect('/');
        }
        
        view('user', [
            "title" => "Welcome",
            "user" => $_SESSION['user']['name'], 
            "data" => $this->data,
        ]);

        return $response;
    }

    public function destroy() {
        session_destroy();
        return redirect('/');
    }

} 