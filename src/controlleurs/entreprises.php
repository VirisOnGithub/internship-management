<?php
require_once "src/RequireLogin.php";
require_once "src/crud/Read.php";

$nom = $_GET['nom'] ?? "";
$ville = $_GET['ville'] ?? "";
$specs = $_GET['specs'] ?? "";

if (empty($specs)) {
	$specs = [];
} else {
	$specs_string = trim($specs);
	$specs = explode(",", $specs_string);
	for ($i = 0; $i < sizeof($specs); $i++) {
		$specs[$i] = (int) $specs[$i];
	}
}

$data = ["entreprises" => Crud\chercherEntreprisesParCritères($nom, $ville, $specs)];