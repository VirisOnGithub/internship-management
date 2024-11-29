<?php

set_include_path($_SERVER['DOCUMENT_ROOT']);

// on a besoin de ces includes pour correctement démarrer la session
require_once 'src/modele/Etudiant.php';
require_once 'src/modele/Professeur.php';

session_start();

require_once 'src/Login.php';
require_once 'vendor/autoload.php';

require_once 'src/Toast.php';

// Default page is accueil
if (!isset($_GET['page'])) {
    header("Location: /public/index.php?page=accueil");
    exit;
}

$data = [];

$page = $_GET['page'];

$controlleur = $_SERVER['DOCUMENT_ROOT'] . '/src/controlleurs/' . $page . '.php';
$vue = $page . '.html.twig';

// If the controller or vue is not found, return 404
if (!file_exists($controlleur) || !file_exists($_SERVER['DOCUMENT_ROOT'] . "/templates/" . $vue)) {
    require_once 'src/HttpResponses.php';
    redirectError(404);
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);
$twig->addFunction(new \Twig\TwigFunction('isUserConnected', 'Login\isUserConnected'));
$twig->addFunction(new \Twig\TwigFunction('getFirstLetters', 'Login\getFirstLetters'));
$twig->addFunction(new \Twig\TwigFunction('getConnectedUser', 'Login\getConnectedUser'));

restoreLastToast();

require_once $controlleur;

$data = array_merge($data, $toast_data ?? []);

echo $twig->render($vue, $data);
