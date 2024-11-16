<?php
    if(isset($_POST['username']) && isset($_POST['password'])) {
        require_once "src/Login.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = Login\connectEtudiant($username, $password);
        if($result == \Crud\CheckResult::Success) {
            header("Location: index.php?page=stagiaire");
        } else {
            header("Location: index.php?page=login&error=1");
        }
    } else {
        require_once "src/crud/Read.php";
        $data = array("not_connected" => $_GET['not_connected'] ?? 0);
    }