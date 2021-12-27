<?php

session_start();
session_destroy();

$msg = [
    "Mensagem" => "O Usuario fez logout",
];

$argument = http_build_query($msg);
header("location: home.php?$argument");