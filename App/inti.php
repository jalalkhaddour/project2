<?php
ob_start();
session_start();
require_once __DIR__.'/../Core/config.php';
require_once __DIR__.'/../App/Interfaces/InterfaceDatabase.php';
spl_autoload_register(function($name){
    require_once __DIR__."/../Classes/{$name}.class.php";
});

if(isset($_GET['logout']) and $_GET['logout'] == TRUE){
    session_unset();
    session_destroy();
    header("Location: index.php");
}

if(!isset($_GET['page']))
    $page = 1;
else 
    $page = (int)$_GET['page'];


$users = new Users();
$category = new Category();

$post = new Post();

$contact = new Contact();

$pagination = new Pagination();
$payments = new payments();

$start_from = ($page-1) * PERPAGE;
