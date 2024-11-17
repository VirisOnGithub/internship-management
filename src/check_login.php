<?php
require_once 'src/Login.php';

if(!Login\isUserConnected()) {
    if(isset($_GET['page'])){
        header("Location: index.php?page=login&not_connected=1&callback=".$_GET['page']);
    } else {
        header("Location: index.php?page=login&not_connected=1");
    }
    exit();
}