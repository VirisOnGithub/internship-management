<?php

// fichier à appeler dans les pages avec des privilèges (seul le prof et l'élève en lui-même peut changer)
require_once 'src/RequireLogin.php';
if(!(Login\getConnectedUser() instanceof \Professeur || (Login\getConnectedUser() instanceof \Etudiant))){
    header("Location: index.php?page=login&redirect=" . $_GET["page"]);
    exit;
}