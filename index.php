<?php
session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/*
    * Controllers
    */
$router->namespace("Source\Controllers");



/*
    * Rotas 
    */
if(isset($_SESSION['ADMIN']['USER'])) {
    $router->group(null);
    $router->get("/", "App:Dashboard");
    $router->get('/Novo', 'App:Novo');
    $router->get("/Dashboard", "App:Dashboard");
    $router->get('/Cadastro', 'App:Cadastro');
    $router->get('/Uploader', 'App:Test');
    $router->get('/Capturar', 'App:Capturar');

    /**
     * New
     */
    $router->group("New");
    $router->get('/Gallery', 'Novo:Gallery');
    $router->get('/Capture', 'Novo:Capturar');
} else {
    $router->group(null);
    $router->get('/', 'App:Home');
    $router->get('/Home', 'App:Home');
    $router->get('/Login', 'App:Login');

}

/*
    * WS
    */
$router->group('WS');

/**
 * @return Dashboard
 * @group WS
 */
$router->post("/Dashboard/Info", "Dashboard:Info");

/**
* @return Session
* @group WS
*/
$router->post("/Session/Login", "Session:Login");
$router->post("/Session/Logout", "Session:LogOut");

/*
* Erro
*/
$router->group('Erro');
$router->get('/{errcode}', "App:Erro");

$router->dispatch();

if ($router->error()) {
    // $router->redirect("/Erro/{$router->error()}");
    $router->redirect("/");
}
