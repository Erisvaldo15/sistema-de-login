<?php

function redirect(string $path) {
    return header("location: {$path}");
}