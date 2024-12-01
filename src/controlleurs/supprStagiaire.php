<?php

require_once 'src/crud/Read.php';
require_once 'src/crud/Delete.php';
require_once 'src/RequireLogin.php';
require_once 'src/Permissions.php';
require_once 'src/HttpResponses.php';

if (Permissions\hasAutorisationProfesseur()) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stagiaire = Crud\getEtudiantById($id);

        if ($stagiaire) {
            try {
                Crud\deleteEtudiant($stagiaire);
                setNextToast(ToastType::Success, "L'étudiant a bien été supprimé.");
            } catch (Exception $e) {
                Logs\write($e);
                setNextToast(ToastType::Error, "Erreur pendant la suppression. Veuillez réessayer");
            }
        } else {
            setNextToast(ToastType::Error, "Le stagiare n'existe pas.");
        }

        header('Location: index.php?page=stagiaires');
    } else {
        redirectError(404);
    }
} else {
    redirectError(401);
}
