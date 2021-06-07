<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class SystemCliente extends DataLayer
{

    public function __construct()
    {
        parent::__construct('cliente', ["nome", "celular", "cep", "rua", "nr", "bairro", "cidade", "uf", "empresa_id"], 'id', true);
    }
}
