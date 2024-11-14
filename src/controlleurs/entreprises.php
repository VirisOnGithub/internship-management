<?php

require_once "src/crud/Read.php";

$nom = $_GET['nom'] ?? "";
$ville = $_GET['ville'] ?? "";

$data = ["entreprises" => Crud\chercherEntreprisesParCritères($nom, $ville)];