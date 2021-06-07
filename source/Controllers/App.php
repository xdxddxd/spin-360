<?php

namespace Source\Controllers;
use Source\Models\SystemUser;

class App{

    public function Home($data){
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/App/Deslogado/Home.php";
        require __DIR__."/../views/Static/Footer.php";
    }

    public function Login($data){
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/Static/SplashScreen.php";
        require __DIR__."/../views/App/Deslogado/Login.php";
        require __DIR__."/../views/Static/Footer.php";
    }
    
    public function Cadastro($data){
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/Static/SplashScreen.php";
        require __DIR__."/../views/App/Deslogado/Cadastro.php";
        require __DIR__."/../views/Static/Footer.php";
    }

    public function Perfil($data){
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/Static/SplashScreen.php";
        require __DIR__."/../views/Static/Menu.php";
        require __DIR__."/../views/App/Logado/Perfil.php";
        require __DIR__."/../views/Static/Footer.php";
    }

    public function Dashboard($data){
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/Static/SplashScreen.php";
        require __DIR__."/../views/Static/Menu.php";
        require __DIR__."/../views/App/Logado/Dashboard.php";
        require __DIR__."/../views/Static/Footer.php";
    }

    public function Galeria($data){
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/Static/SplashScreen.php";
        require __DIR__."/../views/Static/Menu.php";
        require __DIR__."/../views/App/Logado/Galeria.php";
        require __DIR__."/../views/Static/Footer.php";
    }

    /**
     * Erros
     */
    public function Erro($data){
        require __DIR__."/../views/Static/Head.php";
        require __DIR__."/../views/Static/Erro.php";
        require __DIR__."/../views/Static/Footer.php";
    }

    public function TesteUser($data)
    {
        $user = new SystemUser();
        $user->nome = "Derik";
        $user->email = "contato@xdxddxd.com";
        $user->senha = "xdxddxd";

        if(!$user->save()) {
            echo "<h3>Ooops: {$user->fail()->getMessage()}</h3>";
        }

        echo "<h2>User</h2>";
        var_dump($user->data());
    }

}