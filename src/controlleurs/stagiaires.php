<?php

require_once "src/crud/Read.php";

$stages = Crud\getStages();
$etudiants_non_stagiaires = Crud\getEtudiants();

foreach ($stages as $stage) {
    $stagiaire = $stage->getStagiaire();
    $key = array_search($stagiaire, $etudiants_non_stagiaires);
    if ($key !== false) {
        unset($etudiants_non_stagiaires[$key]);
    }
}

$data = [
    "stages" => $stages,
    "etudiants_non_stagiaires" => $etudiants_non_stagiaires
];

foreach (["delete", "update"] as $message) {
    if (isset($_GET[$message])) {
        $data[$message] = $_GET[$message];
    }
}
