<?php

use function Crud\getNextEntrepriseId;

    if(isset($_POST['raisonSociale'])) {
        require_once "src/crud/Create.php";
        require_once "src/crud/Read.php";
        $specialites = array();
        foreach ($_POST['specialites'] as $specialite) {
            $specialites[] = intval($specialite);
        }
        $entreprise = new Entreprise(
            Crud\getNextEntrepriseId(),
            $_POST['raisonSociale'],
            $_POST['nomContact'],
            $_POST['nomResponsable'],
            $_POST['rue'],
            (int) intval($_POST['codePostal']),
            $_POST['ville'],
            $_POST['telephone'],
            $_POST['fax'],
            $_POST['email'],
            $_POST['observation'],
            $_POST['lienSite'],
            $_POST['niveauEtude'],
            true
        );
        Crud\createEntreprise($entreprise);

        foreach ($specialites as $specialite) {
            Crud\createSpecialiteEntreprise($entreprise->getNumero(), $specialite);
        }
        header("Location: index.php?page=entreprises");
    } else {
        require_once "src/crud/Read.php";
        $data = array("specialites" => Crud\getSpecialites());
    }