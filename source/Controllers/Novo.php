<?php

namespace Source\Controllers;

use Source\Models\Archive;

class Novo{

    /**
     * New
     */
    public function Gallery($data)
    {
        unset($_SESSION['pics']);

        $pics = (new Archive())->find("id_produto = :idprd", "idprd={$data['id']}")->order("sequencia");
        $_SESSION['pics'] = $pics->fetch(true);

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
