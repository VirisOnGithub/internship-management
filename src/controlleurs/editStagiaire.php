<?php
if (
    isset($_POST['id']) &&
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['login']) &&
    isset($_POST['password']) &&
    isset($_POST['classe']) &&
    isset($_POST['isActive'])
) {
    require_once 'src/crud/Read.php';
    require_once 'src/crud/Update.php';
    $mdp = empty($_POST['password']) ? Crud\getEtudiantById($_POST['id'])->getMdp() : password_hash($_POST['password'], PASSWORD_BCRYPT);
    $data = new Etudiant(
        $_POST['id'],
        $_POST['nom'],
        $_POST['prenom'],
        !empty($_POST['anneeObtention']) ? new DateTime($_POST['anneeObtention'] . "-01-01") : null,
        $_POST['login'],
        $mdp,
        Crud\getClasseById($_POST['classe']),
        $_POST['isActive']
    );
    try {
        Crud\updateEtudiant($data);
    } catch (Exception $e) {
        header('Location: index.php?page=stagiaires&update=error');
    }
    header('Location: index.php?page=stagiaires&update=success');
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    require_once 'src/crud/Read.php';
    $stagiaire = Crud\getEtudiantById($id);
    $annee = $stagiaire->getAnneeObtention() ? $stagiaire->getAnneeObtention()->format('Y') : null;
    $data = [
        "stagiaire" => $stagiaire,
        "classes" => Crud\getClasses(),
        "annee" => $annee
    ];
} else {
    header('Location: index.php?page=400.php');
}