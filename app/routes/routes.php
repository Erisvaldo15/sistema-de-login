<?php

use Slim\App;
use app\controllers\LoginController;
use app\controllers\PainelUserController;
use app\controllers\RegisterController;

function routes(App $app) {
    $app->get('/', [LoginController::class, 'index']);
    $app->get('/register', [RegisterController::class, 'index']);
    $app->get('/user', [PainelUserController::class, 'index']);
    $app->get('/logout', [PainelUserController::class, 'destroy']);
    $app->post('/login', [LoginController::class, 'store']);
    $app->post('/register/store', [RegisterController::class, 'store']);
}