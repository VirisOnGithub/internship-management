<?php
require_once 'src/Login.php';
if (Login\isUserConnected()) {
    Login\logOut();
}
setNextToast(ToastType::Info, "Vous avez été déconnecté.");
header("Location: index.php?page=accueil");