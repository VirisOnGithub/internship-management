<?php
require_once 'src/RequireLogin.php';
require_once 'src/Permissions.php';
require_once 'src/HttpResponses.php';

if (!Permissions\hasAutorisationProfesseur()) {
    redirectError(401);
}

if (isset($_POST['nom'])) {
    require_once "src/crud/Create.php";
    require_once "src/crud/Read.php";
    $classe = Crud\getClasseById($_POST['classe']);
    $etudiant = new \Etudiant(
        -1, // déterminé automatiquement
        $_POST['nom'],
        $_POST['prenom'],
        !empty($_POST['anneeObtention']) ? new DateTime($_POST['anneeObtention'] . "-01-01") : null,
        $_POST['login'],
        password_hash($_POST['password'], PASSWORD_BCRYPT),
        $classe,
        $_POST['isActivite'] ?? false
    );
    try {
        Crud\createEtudiant($etudiant);
        setNextToast(ToastType::Success, "L'étudiant a bien été ajouté.");
    } catch (Exception $e) {
        Logs\write($e);
        setNextToast(ToastType::Error, "Erreur pendant l'ajout. Veuillez réessayer");
    }
    header("Location: index.php?page=stagiaires");
} else {
    $data = ["classes" => Crud\getClasses()];
}
