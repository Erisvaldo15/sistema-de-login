<?php

ini_set('display_errors', 1);

session_start();

date_default_timezone_set('America/Sao_Paulo');

require_once '../vendor/autoload.php';

use Slim\Factory\AppFactory;

try {

    $app = AppFactory::create();

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
    $dotenv->load();

    routes($app);

    $app->run();
}

catch(Throwable) {
    echo "<span> Ops, algum falha inesperada ocorreu! Deseja <a href='/'> voltar para o início? </a> </span>";
}

