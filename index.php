<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();

require_once 'bootstrap.php';

use App\Router;
use App\Controllers\Authorization;
use App\Controllers\Registration;
use App\Controllers\Main;
use App\Controllers\Admin;
use App\Application;

$router = new Router();

$router->get('/', Main::class.'@getIndex');
$router->get('/test', Main::class.'@getTest');
$router->get('/login', Authorization::class.'@getLoginForm');
$router->post('/login', Authorization::class.'@login');
$router->get('/logout', Authorization::class.'@logout');
$router->get('/register', Registration::class.'@getRegisterForm');
$router->post('/register', Registration::class.'@register');
$router->get('/admin', Admin::class.'@getIndex');
$router->get('/admin/\w+(\?.*?)?$', Admin::class.'@getModel');
$router->get('/admin/\w+(\?.*?)?$', Admin::class.'@getModel');
$router->get('/admin/post/create', Admin::class.'@createPost');
$router->post('/admin/post/create', Admin::class.'@savePost');
$router->get('/admin/post/create', Admin::class.'@updatePost');
$router->post('/admin/post/create', Admin::class.'@updatePost');


$application = new Application($router);
$application->run();

//var_dump($_SESSION);