<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});
// định nghĩa đường dẫn
// $router->get('/', function(){
//     return "trang chủ<br>";
// });

// Home
$router->get('/', [App\Controllers\HomeController::class, 'index']);

// Category
$router->get('list-category', [App\Controllers\CategoryController::class, 'index']);
$router->get('add-category', [App\Controllers\CategoryController::class, 'addCategory']);
$router->post('post-category', [App\Controllers\CategoryController::class, 'postCategory']);
$router->get('detail-category/{id}', [App\Controllers\CategoryController::class, 'detail']);
$router->post('edit-category/{id}', [App\Controllers\CategoryController::class, 'editCategory']);
$router->get('delete-category/{id}', [App\Controllers\CategoryController::class, 'deleteCategory']);

// Product 
$router->get('list-product', [App\Controllers\ProductController::class, 'index']);
$router->get('add-product', [App\Controllers\ProductController::class, 'addProduct']);
$router->post('post-product', [App\Controllers\ProductController::class, 'postProduct']);
$router->get('detail-product/{id}', [App\Controllers\ProductController::class, 'detail']);
$router->post('edit-product/{id}', [App\Controllers\ProductController::class, 'editProduct']);
$router->get('delete-product/{id}', [App\Controllers\ProductController::class, 'deleteProduct']);

// User
$router->get('list-user', [App\Controllers\UserController::class, 'index']);
$router->get('add-user', [App\Controllers\UserController::class, 'addUser']);
$router->post('post-user', [App\Controllers\UserController::class, 'postUser']);
$router->get('detail-user/{id}', [App\Controllers\UserController::class, 'detail']);
$router->post('edit-user/{id}', [App\Controllers\UserController::class, 'editUser']);
$router->get('delete-user/{id}', [App\Controllers\UserController::class, 'deleteUser']);






# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;