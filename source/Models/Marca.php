<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Marca extends DataLayer
{

    public function __construct()
    {
        parent::__construct('marca', ["nome", "categoria_id"], 'id', false);
    }

}
