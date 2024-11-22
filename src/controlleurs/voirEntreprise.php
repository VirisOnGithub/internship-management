<?php
require_once 'src/crud/Read.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $entreprise = Crud\getEntrepriseByIdWithSpecialites($id);
    $data = [
        'entreprise' => $entreprise
    ];
} else {
    header('Location: index.php');
}