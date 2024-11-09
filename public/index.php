<?php

require_once '../vendor/autoload.php';

if(isset($_GET['page'])){
    $page = $_GET['page'];
    // require_once '../src/'.$page.'.php';
    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);
    echo $twig->render($page.'.html.twig', $data);
} else {
    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('index.html.twig');
}