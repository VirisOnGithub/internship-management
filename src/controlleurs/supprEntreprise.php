<?php

require_once 'src/crud/Read.php';
require_once 'src/crud/Delete.php';
require_once 'src/RequireLogin.php';
require_once 'src/Permissions.php';

function redirect()
{
    header('Location: index.php?page=entreprises');
    exit();
}

if(Permissions\hasAutorisationProfesseur() && isset($_GET['id']))
{
        $id = $_GET['id'];
        $entreprise = Crud\getEntrepriseById($id);
        if ($entreprise) {
            Crud\deleteEntreprise($entreprise);
        } else {
            header('Location: index.php?page=entreprises&delete=error');
        }
        header('Location: index.php?page=entreprises&delete=success');
} else {
    // si quelqu'un arrive ici, quelqu'un essaie de truander
    redirect();
}