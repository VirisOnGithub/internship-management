<?php

if (
    isset($_POST['raisonSociale'])
    && isset($_POST['nomContact'])
    && isset($_POST['nomResponsable'])
    && isset($_POST['rue'])
    && isset($_POST['codePostal'])
    && isset($_POST['ville'])
    && isset($_POST['telephone'])
    && isset($_POST['fax'])
    && isset($_POST['email'])
    && isset($_POST['observation'])
    && isset($_POST['lienSite'])
    && isset($_POST['niveauEtude'])
) {
    require_once "src/crud/Create.php";
    $niveauEtude = implode('/', $_POST['niveauEtude']);
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
        $niveauEtude,
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
