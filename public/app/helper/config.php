<?php

function message($message) {
    $msg = ["message" => "$message"];
    $argument = http_build_query($msg);
    header("location: ../../index.php?$argument");
}