<?php

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

catch (Throwable $th) {
    dd("Error: {$th->getMessage()} in line: {$th->getLine()} from file: {$th->getFile()}");
}
