<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Vendas extends DataLayer
{

    public function __construct()
    {
        parent::__construct('vendas', ["produtos", "total", "caixa_id"], 'id', true);
    }

}
