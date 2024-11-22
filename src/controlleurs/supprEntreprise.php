<?php

require_once 'src/crud/Read.php';
require_once 'src/crud/Delete.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $entreprise = Crud\getEntrepriseById($id);
    if ($entreprise) {
        Crud\deleteEntreprise($entreprise);
    } else {
        header('Location: index.php?page=entreprises&delete=error');
    }
    header('Location: index.php?page=entreprises&delete=success');
} else {
    header('Location: index.php?page=entreprises');
}