<?php

function view(string $view, array $data = []) {
    $latte = new \Latte\Engine;
    $latte->render("../app/views/{$view}.latte", $data);
}