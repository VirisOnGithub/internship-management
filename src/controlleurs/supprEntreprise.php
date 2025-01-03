<?php

require_once 'src/crud/Read.php';
require_once 'src/crud/Delete.php';
require_once 'src/RequireLogin.php';
require_once 'src/Permissions.php';
require_once 'src/HttpResponses.php';

if (!Permissions\hasAutorisationProfesseur()) {
    redirectError(401);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $entreprise = Crud\getEntrepriseById($id);

    if ($entreprise) {
        try {
            Crud\deleteEntreprise($entreprise);
            setNextToast(ToastType::Success, "L'entreprise a été supprimée avec succès.");
        } catch (Exception $e) {
            Logs\write($e);
            setNextToast(ToastType::Error, "Erreur pendant la suppression. Veuillez réessayer");
        }
    } else {
        setNextToast(ToastType::Error, "L'entreprise n'existe pas.");
    }

    header('Location: index.php?page=entreprises');
} else {
    // si quelqu'un arrive ici, quelqu'un essaie de truander
    redirectError(404);
}
