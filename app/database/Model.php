<?php

namespace app\database;

use app\database\Connection;

abstract class Model {

    protected $connection;

    public function __construct()
    {
        $this->connection = Connection::connection();
    }
}