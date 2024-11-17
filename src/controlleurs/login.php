<?php
    if(isset($_POST['username']) && isset($_POST['password'])) {
        require_once "src/Login.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = Login\connectEtudiant($username, $password);
        if($result == \Crud\CheckResult::Success) {
            $callback = $_GET['callback'] ?? 'accueil';
            header("Location: index.php?page=" . $callback);
        } else {
            if(isset($_GET['callback'])){
                header("Location: index.php?page=login&error=1&callback=".$_GET['callback']);
            } else {
                header("Location: index.php?page=login&error=1");
            }
        }
    } else {
        require_once "src/crud/Read.php";
        $callback = isset($_GET['callback']) ? ['callback' => $_GET['callback']] : 0;
        $not_connected = isset($_GET['not_connected']) ? ['not_connected' => $_GET['not_connected']] : 0;
        $error =  isset($_GET['error']) ? ['error' => $_GET['error']] : 0;
        $data = [];
        foreach ([$callback, $not_connected, $error] as $option) {
            if($option != 0){
                $data = array_merge($data, $option);
            }
        }
    }