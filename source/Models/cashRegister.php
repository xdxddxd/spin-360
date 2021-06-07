<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class cashRegister extends DataLayer
{

    public function __construct()
    {
        parent::__construct('caixa', ["abertura", "system_user_id"], 'id', true);
    }

}
