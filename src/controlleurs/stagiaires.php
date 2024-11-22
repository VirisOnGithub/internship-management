<?php

require_once "src/crud/Read.php";

$data = array(
    "stagiaires" => Crud\getEtudiants()
);
if(isset($_GET['delete'])){
    $data['delete'] = $_GET['delete'];
}


$twig->addFunction(new \Twig\TwigFunction('getProfesseurById', 'Crud\getProfesseurById'));