<?php

require_once "src/crud/Read.php";
class EntrepriseSpecialites{
    function getEntrepriseSpecialites($entreprise){
        return Crud\getEntrepriseSpecialites($entreprise);
    }
}
$data = array("entreprises" => Crud\getEntreprises(), "specialites" => new EntrepriseSpecialites());