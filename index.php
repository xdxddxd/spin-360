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
    $router->get('/Gallery/{id}', 'Novo:Gallery');
    $router->get('/Capture/{id}', 'Novo:Capturar');
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

/**
 * @return Produto
 * @group WS
 */
$router-> post("/Produto/Create", "Produto:Create");

/**
 * @return Output
 * @group WS
 */
$router->post("/Output/Picture", "Output:Picture");
$router->post("/Output/Image/Update/Get", "Output:PictureGet");
$router->post("/Output/Image/Update", "Output:PictureUpdate");

$router->post("/Output/Spin/Externo", "Output:SpinExt");
$router->post("/Output/Spin/Interno", "Output:SpinInt");

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