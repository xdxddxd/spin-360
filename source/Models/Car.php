<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Car extends DataLayer
{

    public function __construct()
    {
        parent::__construct('users', ["nome", "email", "senha"], 'id', true);
    }

}
