<?php

define('ROOT', dirname(__DIR__));

require ROOT. '/app/App.php';

App::load();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
}else {
    $p = "posts.home";
}

$pages = explode(".", $p);
if($pages[0] === 'admin') {
    $action = $pages[2];
    $controller = 'App\Controller\admin\\'. ucfirst($pages[1]) .'Controller';
}else {
    $action = $pages[1];
    $controller = 'App\Controller\\'. ucfirst($pages[0]) .'Controller';    
}
$controller = new $controller();

$controller->$action();
