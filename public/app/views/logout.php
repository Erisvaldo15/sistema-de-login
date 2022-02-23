<?php

include_once "../helpers/config.php";

session_start();
session_destroy();

if(!Validation::verifySession());

message("Volte logo e até mais!");

// Seria correto deixar assim ou como se trata de ser um arquivo HTML, seria melhor completar
// com o básico do HTML? 
