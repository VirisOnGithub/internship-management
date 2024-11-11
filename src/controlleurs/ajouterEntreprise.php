<?php

if (isset($_POST['raisonSociale'])) {
    require_once "src/crud/Create.php";

    // le numéro va être déterminé automatiquement
    $entreprise = new Entreprise(
        -1,
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

    foreach ($_POST['specialites'] as $specialite) {
        $entreprise->ajouterSpecialite(new Specialite(intval($specialite), "non_utilisé"));
    }

    Crud\createEntreprise($entreprise);

    header("Location: index.php?page=entreprises");
} else {
    require_once "src/crud/Read.php";
    $data = array("specialites" => Crud\getSpecialites());
}
