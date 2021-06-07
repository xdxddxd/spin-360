<?php

namespace Source\Controllers;

class Novo{

    /**
     * New
     */
    public function Gallery($data)
    {
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/Static/SplashScreen.php";
        require __DIR__."/../views/Static/Menu.php";
        require __DIR__."/../views/App/Logado/New/Gallery.php";
        require __DIR__."/../views/Static/Footer.php";
    }
    
    public function Capturar($data)
    {
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/Static/MenuDraggable.php";
        require __DIR__."/../views/App/Logado/New/Capturar.php";
        require __DIR__."/../views/Static/Footer.php";
    }

}
