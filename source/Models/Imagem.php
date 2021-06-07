<?php

namespace Source\Models;

use CoffeeCode\Uploader\Image;

class Imagem extends Image
{

    public function __construct()
    {
        parent::__construct(__DIR__."/../../assets/uploads", "images", true);
    }

}
