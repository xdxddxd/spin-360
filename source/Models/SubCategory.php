<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class SubCategory extends DataLayer
{

    public function __construct()
    {
        parent::__construct('subcategoria', ["nome","categoria_id"], 'id', false);
    }

}
