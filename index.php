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
    $router->get("/Dashboard", "App:Dashboard");
    $router->get("/Galeria", "App:Galeria");
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
 * @return EMPRESA
 * @group WS
 */
$router->post("/Empresa/Cadastro", "Empresa:Cadastro");

/**
 * @return CLIENTE
 * @group WS
 */
$router->post("/Cliente/Cadastro", "Cliente:Cadastro");
$router->post("/Cliente/Consulta", "Cliente:Consultar");

/**
 * @return SubCategoria
 * @group WS
 */
//$router->post("/Sub/Categoria/Cadastro", "SubCategoria:Cadastro");
$router->post("/Sub/Categoria/Consulta", "SubCategoria:Consultar");

/**
 * @return Marca
 * @group WS
 */
//$router->post("/Marca/Cadastro", "Brand:Cadastro");
$router->post("/Marca/Consulta", "Brand:Consultar");

/**
 * @return PERFIL
 * @group WS
 */
$router->post("/Perfil/Senha/Atualizar", "Perfil:PassUpdate");
$router->post("/Perfil/Foto/Atualizar", "Perfil:PicUpdate");

/**
 * @return User
 * @group WS
 */
$router->post("/SystemUser/Cadastro", "Usuario:Cadastro");
$router->post("/SystemUser/Consulta", "Usuario:Consultar");
$router->post("/SystemUser/Block", "Usuario:Block");

/**
 * @return PRODUTO
 * @group WS
 */
$router->post("/Produto/Cadastro", "Produto:Cadastrar");
$router->post("/Produto/Consultar", "Produto:Consultar");

/**
 * @return AcessLevel
 * @group WS
 */
$router->post("/Cargo/Consulta", "Cargo:Consulta");

/**
 * @return SESSION
 * @group WS
 */
$router->post("/Session/Login", "Session:Login");
$router->post("/Session/Logout", "Session:Logout");
$router->post("/Session/Verify", "Session:Verify");

/**
 * @return Caixa
 * @group WS
 */
$router->post("/Caixa/Toogle", "Caixa:Toogle");
$router->post("/Caixa/isOpen", "Caixa:isOpen");
$router->post("/Caixa/Produtos", "Caixa:Produtos");
$router->post("/Caixa/Abrir", "Caixa:Abrir");
$router->post("/Caixa/Fechar", "Caixa:Fechar");

/**
 * @return Cart
 * @group WS
 */
$router->post("/Cart/Add", "Cart:Add");
$router->post("/Cart/Get", "Cart:Get");
$router->post("/Cart/Atualizar", "Cart:Atualizar");
$router->post("/Cart/Remover", "Cart:Remover");
$router->post("/Cart/Finalizar", "Cart:Finalizar");
$router->post("/Cart/CalcRetorno", "Cart:CalcRetorno");

/**
 * @return Sells
 * @group WS
 */
$router->post("/Sells/Historico", "Sells:Historico");
$router->post("/Sells/ProductList", "Sells:ProductList");
$router->post("/Sells/Cancelar", "Sells:Cancelar");

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
