<?php
require_once 'src/RequireLogin.php';
require_once 'src/Permissions.php';
require_once 'src/HttpResponses.php';

if (!Permissions\hasAutorisationProfesseur()) {
    redirectError(401);
}

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

    try {
        Crud\createEntreprise($entreprise);
        setNextToast(ToastType::Success, "L'entreprise a bien été ajoutée.");
    } catch (Exception $e) {
        Logs\write($e);
        setNextToast(ToastType::Error, "Erreur pendant l'ajout. Veuillez réessayer");
    }

    header("Location: index.php?page=entreprises");
} else {
    require_once "src/crud/Read.php";
    $data = array("specialites" => Crud\getSpecialites());
}
