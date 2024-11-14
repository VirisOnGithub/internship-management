<?php

require_once 'src/crud/Read.php';
require_once 'src/crud/Update.php';

if(isset($_POST['raisonSociale'])){
    $niveauEtudeTab = $_POST['niveauEtude'];
    $niveauEtude = '';
    foreach($niveauEtudeTab as $niveau){
        $niveauEtude .= $niveau . '/';
    }
    $niveauEtude = rtrim($niveauEtude, '/'); // remove last '/'

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

    Crud\updateEntreprise($entreprise);

    header('Location: index.php?action=entreprises?update=success');
} elseif (isset($_GET['id'])){
    $id = $_GET['id'];
    $entreprise = Crud\getEntrepriseById($id);
    $data = [
        'entreprise' => $entreprise,
        'specialites' => Crud\getSpecialites()
    ];
}