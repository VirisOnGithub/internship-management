<?php
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
    Crud\createEtudiant($etudiant);
    header("Location: index.php?page=stagiaires&add=success");
} else {
    require_once "src/crud/Read.php";
    $data = array("classes" => Crud\getClasses());
}