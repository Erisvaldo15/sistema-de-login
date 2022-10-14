<?php

use app\classes\Message;

function message(string $key): string|bool {

    $message = Message::get($key);

    if(isset($message['message'])) {
        return $message['message'];
    }

    return false;
}