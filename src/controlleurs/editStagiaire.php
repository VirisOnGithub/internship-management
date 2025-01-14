<?php

require_once 'src/crud/Read.php';
require_once 'src/RequireLogin.php';
require_once 'src/Permissions.php';
require_once 'src/HttpResponses.php';

if (!Permissions\hasAutorisationProfesseur()) {
    redirectError(401);
}

if (
    isset($_POST['id']) &&
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['login']) &&
    isset($_POST['password']) &&
    isset($_POST['classe'])
) {
    require_once 'src/crud/Update.php';
    $mdp = empty($_POST['password']) ? Crud\getEtudiantById($_POST['id'])->getMdp() : password_hash($_POST['password'], PASSWORD_BCRYPT);
    $data["stagiaire"] = new Etudiant(
        $_POST['id'],
        $_POST['nom'],
        $_POST['prenom'],
        !empty($_POST['anneeObtention']) ? new DateTime($_POST['anneeObtention'] . "-01-01") : null,
        $_POST['login'],
        $mdp,
        Crud\getClasseById($_POST['classe']),
        $_POST['isActive'] ?? 0
    );
    try {
        Crud\updateEtudiant($data["stagiaire"]);
    } catch (Exception $e) {
        Logs\write($e);
        setNextToast(ToastType::Error, "Erreur pendant la modification. Veuillez réessayer");
    }
    setNextToast(ToastType::Success, "L'étudiant a bien été modifié.");
    header('Location: index.php?page=stagiaires');
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stagiaire = Crud\getEtudiantById($id);
    $annee = $stagiaire->getAnneeObtention() ? $stagiaire->getAnneeObtention()->format('Y') : null;
    $data = [
        "stagiaire" => $stagiaire,
        "classes" => Crud\getClasses(),
        "annee" => $annee
    ];
} else {
    redirectError(401);
}
