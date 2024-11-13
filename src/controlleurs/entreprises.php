<?php

require_once "src/crud/Read.php";

if(isset($_GET['nom']) && isset($_GET['ville'])){
    $nom = $_GET['nom'];
    $ville = $_GET['ville'];
    if($nom == "" && $ville != ""){
        $data = array("entreprises" => Crud\chercherEntreprisesParCritères(["ville_entreprise" => $ville]));
    } elseif ($nom != "" && $ville == ""){
        $data = array("entreprises" => Crud\chercherEntreprisesParCritères(["raison_sociale" => $nom]));
    } elseif ($nom != "" && $ville != ""){
        $data = array("entreprises" => Crud\chercherEntreprisesParCritères(["raison_sociale" => $nom, "ville_entreprise" => $ville]));
    } else {
        $data = array("entreprises" => Crud\getEntreprises());
    }
} else {
    $data = array("entreprises" => Crud\getEntreprises());
}