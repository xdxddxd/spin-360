<?php

namespace Source\Controllers;
use Source\Models\SystemUser;

class Consultar{

    public function Usuarios($data){
        require __DIR__."/../views/SplashScreen.php";
        require __DIR__."/../views/Head.php";
        require __DIR__."/../views/Menu.php";
        $user = new SystemUser();
        $list = $user->find()->fetch(true);

        $return = array();

        foreach ($list as $userItem) {
            $return[$userItem->id] = [
                "id"    => $userItem->id,
                "nome"  => $userItem->nome,
                "email" => $userItem->email,
            ];
        }
        echo json_encode($return);
        require __DIR__."/../views/Footer.php";
    }
    
    public function HomeCars($data){
        
    }

}