<?php
require_once "App/Controllers/ProductController.php";
require_once "App/Controllers/UserController.php";
require_once "App/Controllers/HomeController.php";
require_once "App/Controllers/CartController.php";

$url = $_GET['url'] ?? 'product/index';
$urlArr = explode('/', $url);

$controllerName = ucfirst($urlArr[0]) . "Controller";
$action = $urlArr[1] ?? 'index';

$controller = new $controllerName();
call_user_func([$controller, $action]);


// if ($urlArr[0] == 'product') {
//     $controler = new ProductController();
//     if ($urlArr[1] == "create") {
//         $controler->index();
//     } else
//         $controler->index();
// } elseif ($urlArr[0] == 'user') {
//     $controler = new UserController();
//     if ($urlArr[1] == "create") {
//         $controler->index();
//     } else
//         $controler->index();
// } else {
//     echo "no where to go";
// }
