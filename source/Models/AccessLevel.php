<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class AccessLevel extends DataLayer
{

    public function __construct()
    {
        parent::__construct('access_level', ["id", "title", "description"], 'id', false);
    }

}
