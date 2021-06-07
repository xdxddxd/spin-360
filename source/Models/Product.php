<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Product extends DataLayer
{

    public function __construct()
    {
        parent::__construct('products', ["name", "value", "qtd", "marca_id", "subcategoria_id", "empresa_id"], 'id', true);
    }

}
