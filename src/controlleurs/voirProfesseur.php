<?php
require_once 'src/crud/Read.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $professeur = Crud\getProfesseurById($id);
    $data = [
        'stagiaire' => $stagiaire
    ];
} else {
    header('Location: index.php');
}