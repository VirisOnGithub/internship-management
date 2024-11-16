<?php
require_once 'src/Login.php';

if(!Login\isUserConnected()) {
    header("Location: index.php?page=login&not_connected=1");
    exit();
}