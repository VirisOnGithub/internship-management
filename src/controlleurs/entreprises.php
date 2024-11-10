<?php

require_once "src/crud/Read.php";
class EntrepriseSpecialites{
    function getEntrpriseSpecialites($entreprise){
        return Crud\getEntrepriseSpecialites($entreprise);
    }
}
$data = array("entreprises" => Crud\getEntreprises(), "specialites" => new EntrepriseSpecialites());