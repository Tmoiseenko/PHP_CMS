<?php

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

use App\Router;
use App\Controlers\Controller;
use App\Application;
use App\Views\View;
use App\Controlers\Books;

$router = new Router();

$router->get('/index', function() {

    return new View('index', [
        'title' => 'Index Page',
        'content' => 'wertyuiop[]asdfghjkl;zxcvbnm,.asdfghjkl2134r5tuop-0dxdfcgvbnm']);
});
$router->get('/test1/*/test2/*', function ($param1, $param2){
    return new View('index', [
        'title' => 'Test parametrs',
        'content' => "Test page whith param1=$param1 and parm2=$param2"]);
});
$router->get('/param/*/param2/*',Controller::class . '@extra');
$router->get('/',Controller::class . '@index');
$router->get('/create-book', Books::class . '@createBook');
$router->get('/get-book', Books::class . '@getAllBooks');

$application = new Application($router);
$application->run();
