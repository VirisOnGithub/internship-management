<?php
require_once 'src/crud/Read.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stagiaire = Crud\getEtudiantById($id);
    $annee = $stagiaire->getAnneeObtention() ? date_format($stagiaire->getAnneeObtention(), 'Y') : null;
    $data = [
        'stagiaire' => $stagiaire,
        'annee' => $annee
    ];
} else {
    header('Location: index.php');
}