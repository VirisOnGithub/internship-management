<?php
require_once 'src/Login.php';

if (!Login\isUserConnected()) {
    // en incluant ce fichier, la page est déjà correctement établie
    header("Location: index.php?page=login&redirect=" . $_GET["page"]);
    exit;
}
