<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class SubCategoria extends DataLayer
{

    public function __construct()
    {
        parent::__construct('subcategoria', ["nome"], 'id', false);
    }

}
