<?php

require_once 'src/crud/Read.php';
require_once 'src/crud/Delete.php';
require_once 'src/RequireLogin.php';
require_once 'src/Permissions.php';

if (isset($_GET['id']) && Permissions\hasAutorisationProfesseur()) {
    $id = $_GET['id'];
    $stagiaire = Crud\getEtudiantById($id);
    if ($stagiaire) {
        Crud\deleteEtudiant($stagiaire);
    } else {
        header('Location: index.php?page=stagiaires&delete=error');
    }
    header('Location: index.php?page=stagiaires&delete=success');
} else {
    header('Location: index.php?page=stagiaires');
}