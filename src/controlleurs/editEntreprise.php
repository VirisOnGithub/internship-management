<?php

require_once 'src/crud/Read.php';
require_once 'src/crud/Update.php';
require_once 'src/RequireLogin.php';
require_once 'src/Permissions.php';
require_once 'src/HttpResponses.php';

if (Permissions\hasAutorisationProfesseur()) {
    if (isset($_POST['raisonSociale'])) {
        $niveauEtudeTab = $_POST['niveauEtude'];
        $niveauEtude = implode('/', $niveauEtudeTab);

        $entreprise = new Entreprise(
            $_POST['id'],
            $_POST['raisonSociale'],
            $_POST['nomContact'],
            $_POST['nomResponsable'],
            $_POST['rue'],
            (int) intval($_POST['codePostal']),
            $_POST['ville'],
            $_POST['telephone'],
            $_POST['fax'],
            $_POST['email'],
            $_POST['observations'],
            $_POST['lienSite'],
            $niveauEtude,
            $_POST['activite']
        );

        try {
            Crud\updateEntreprise($entreprise);
        } catch (Exception $e) {
            Logs\write($e);
            header('Location: index.php?page=entreprises&update=error');
            exit();
        }

        header('Location: index.php?page=entreprises&update=success');
        exit();
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
        $entreprise = Crud\getEntrepriseByIdWithSpecialites($id);
        $niveauEtudeTab = explode('/', $entreprise->getNiveauEtude());
        $data = [
            'entreprise' => $entreprise,
            'specialites' => Crud\getSpecialites(),
            'niveauEtude' => $niveauEtudeTab
        ];
    } else {
        // Qu'est-ce que tu fais là ?
        redirectError(401);
    }
} else {
    redirectError(401);
}