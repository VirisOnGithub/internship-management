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
            Crud\deleteEtudiant($stagiaire);
        } else {
            setNextToast("danger", "Erreur pendant la suppression. Veuillez réessayer");
        }
        setNextToast("success", "L\'étudiant a bien été supprimé.");
        header('Location: index.php?page=stagiaires');
    } else {
        redirectError(404);
    }
} else {
    redirectError(401);
}
