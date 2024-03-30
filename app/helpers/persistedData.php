<?php

use app\classes\PersistedData;

function persistedData(string $field) {
    return PersistedData::get($field);
}