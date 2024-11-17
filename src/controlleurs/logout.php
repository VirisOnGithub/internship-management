<?php
require_once 'src/Login.php';
if(Login\isUserConnected()) {
    Login\logOut();
}
header("Location: index.php?page=accueil");