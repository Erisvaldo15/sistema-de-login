<?php

namespace app\controllers;

use app\database\Insert;
use app\database\Select;

abstract class ModelController {

    protected Insert $insert;
    protected Select $select;
    protected string|array $data;

    public function __construct()
    {
        $this->insert = new Insert;
        $this->select = new Select;
    }
}
