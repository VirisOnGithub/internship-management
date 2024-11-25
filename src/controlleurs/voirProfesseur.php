<?php
require_once 'src/crud/Read.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $professeur = Crud\getProfesseurById($id);
    $classes = Crud\getProfesseurClasses($id);
    $data = [
        'professeur' => $professeur,
        'classes' => $classes
    ];
} else {
    header('Location: index.php');
}