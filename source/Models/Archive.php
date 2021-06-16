<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Archive extends DataLayer
{

    public function __construct()
    {
        parent::__construct('arquivos', ["url", "id_produto"], 'id', false);
    }

}
