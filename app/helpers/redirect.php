<?php

use Psr\Http\Message\ResponseInterface;

function redirect(string $route, ResponseInterface $response) {
    return $response->withHeader("Location", $route)->withStatus(302);
}