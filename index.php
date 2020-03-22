<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();

require_once 'bootstrap.php';

use App\Router;
use App\Controllers\Authorization;
use App\Controllers\Main;
use App\Application;
use App\Views\View;
use App\Controllers\Books;

$router = new Router();

$router->get('/', Main::class.'@getIndex');
$router->get('/login', Authorization::class.'@getLoginForm');
$router->post('/login', Authorization::class.'@login');

$application = new Application($router);
$application->run();
