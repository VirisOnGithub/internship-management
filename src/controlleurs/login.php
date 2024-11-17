<?php

$data = ["username" => ""];
$data['redirect'] = $_GET['redirect'] ?? ($_POST['redirect'] ?? null);

$page_redirect = isset($_GET['redirect']) ? "index.php?page=" . $_GET['redirect'] : "index.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    require_once "src/Login.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = Login\connectEtudiant($username, $password);

    if ($result == \Crud\CheckResult::Success) {
        header("Location: " . $page_redirect);
        exit;
    } else {
        $data['login_error'] = true;
        $data['username'] = $username;
    }
} else {
    $data['not_connected'] = true;
}
