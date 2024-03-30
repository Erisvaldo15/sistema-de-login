<?php

function redirect(string $path) {
    return header("Location: {$path}");
}