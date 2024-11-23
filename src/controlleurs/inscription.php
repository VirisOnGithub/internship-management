<?php

    require_once "src/RequireLogin.php";
    require_once "src/Permissions.php";

    $user = Login\getConnectedUser();

    if(!Permissions\hasAutorisationEtudiant($user->getNumero())){
        header("Location: index.php?page=401");
        exit();
    }

    if(
        isset($_POST['dateDebut']) && !empty($_POST['dateDebut']) &&
        isset($_POST['dateFin']) && !empty($_POST['dateFin']) &&
        isset($_POST['type']) && !empty($_POST['type']) &&
        isset($_POST['entreprise']) && !empty($_POST['entreprise']) &&
        isset($_POST['professeur']) && !empty($_POST['professeur'])
    ){
        require_once "src/crud/Create.php";

        $dateDebut = new DateTime($_POST['dateDebut']);
        $dateFin = new DateTime($_POST['dateFin']);
        $type = $_POST['type'];
        $entreprise = Crud\getEntrepriseById($_POST['entreprise']);
        $professeur = Crud\getProfesseurById($_POST['professeur']);
        $description = $_POST['description'] ?? null;
        $observations = $_POST['observations'] ?? null;
        $eleve = $user instanceof \Etudiant ? $user : Crud\getEtudiantById($_POST['eleve']);

        $stage = new \Stage(
            -1, 
            $dateDebut, 
            $dateFin, 
            $type, 
            $description,
            $observations,
            $eleve,
            $professeur,
            $entreprise, 
        );

        $result = Crud\createStage($stage);

        header("Location: index.php?page=stagiaires");
    } else {
        require_once "src/crud/Read.php";

        $data = [];
    
        $data['eleves'] = Crud\getEtudiants();
        $data['entreprises'] = Crud\getEntreprises();
        $data['professeurs'] = Crud\getProfesseurs();
    
        if($user instanceof \Professeur){
            $data['prof'] = $user->getNom() . " " . $user->getPrenom();
        } else {
            $data['eleve'] = $user;
        }
    }