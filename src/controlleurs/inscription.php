<?php

require_once "src/RequireLogin.php";
require_once "src/Permissions.php";

$user = Login\getConnectedUser();

if (
    isset($_POST['dateDebut']) && !empty($_POST['dateDebut']) &&
    isset($_POST['dateFin']) && !empty($_POST['dateFin']) &&
    isset($_POST['type']) && !empty($_POST['type']) &&
    isset($_POST['entreprise']) && !empty($_POST['entreprise']) &&
    isset($_POST['professeur']) && !empty($_POST['professeur'])
) {
    require_once "src/crud/Create.php";

    $dateDebut = new DateTime($_POST['dateDebut']);
    $dateFin = new DateTime($_POST['dateFin']);
    $type = $_POST['type'];
    $entreprise = Crud\getEntrepriseById($_POST['entreprise']);
    $professeur = Crud\getProfesseurById($_POST['professeur']);
    $description = $_POST['description'] ?? null;
    $observations = $_POST['observations'] ?? null;
    $eleve = $user instanceof \Etudiant ? $user : Crud\getEtudiantById($_POST['eleve']);

    $stage = new \Stage(
        -1,
        $dateDebut,
        $dateFin,
        $type,
        $description,
        $observations,
        $eleve,
        $professeur,
        $entreprise,
    );

    try {
        $result = Crud\createStage($stage);
        setNextToast(ToastType::Success, "L'étudiant a bien été inscrit.");
    } catch (Exception $e) {
        setNextToast(ToastType::Error, "Erreur pendant l'inscription. Veuillez réessayer");
        Logs\write($e);
    }

    header("Location: index.php?page=stagiaires");
} else {
    require_once "src/crud/Read.php";

    $data = [];

    $data['eleves'] = Crud\getEtudiants();
    $data['professeurs'] = Crud\getProfesseurs();

    if (isset($_GET['id'])) {
        $data['idEntreprise'] = Crud\getEntrepriseById($_GET['id']);
    } else {
        $data['entreprises'] = Crud\getEntreprises();
    }

    if ($user instanceof \Professeur) {
        $data['prof'] = $user->getNom() . " " . $user->getPrenom();
    } else {
        $data['eleve'] = $user;
    }
}