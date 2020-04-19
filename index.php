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
use App\Controllers\Post;
use App\Controllers\Subscribe;
use App\Application;

$router = new Router();

$router->get('/', Main::class.'@getIndex');
$router->get('/(\?.*?)?$', Main::class.'@getIndex');
$router->get('/post/\d+', Post::class.'@getPost');
$router->get('/test', Main::class.'@getTest');
$router->get('/login', Authorization::class.'@getLoginForm');
$router->post('/login', Authorization::class.'@login');
$router->get('/logout', Authorization::class.'@logout');
$router->get('/register', Registration::class.'@getRegisterForm');
$router->post('/register', Registration::class.'@register');
$router->get('/admin', Admin::class.'@getIndex');
$router->get('/admin/\w+(\?.*?)?$', Admin::class.'@getModel');
$router->get('/admin/post/create', Post::class.'@createPost');
$router->post('/admin/post/create', Post::class.'@savePost');
$router->get('/admin/post/update/\d+', Post::class.'@getUpdatePost');
$router->post('/admin/post/update/\d+', Post::class.'@saveUpdatePost');
$router->post('/subscribe', Subscribe::class.'@add');
$router->get('/admin/subscribe/delete/\d+', Subscribe::class.'@delete');

$application = new Application($router);
$application->run();
var_dump($_SESSION);