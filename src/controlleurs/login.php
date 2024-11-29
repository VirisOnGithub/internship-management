<?php

$data = ["username" => ""];
$data['redirect'] = $_GET['redirect'] ?? ($_POST['redirect'] ?? null);

$page_redirect = isset($_GET['redirect']) ? "index.php?page=" . $_GET['redirect'] : "index.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    require_once "src/Login.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $etu = Login\connectEtudiant($username, $password);
    $prof = Login\connectProfesseur($username, $password);

    if ($etu == \Crud\CheckResult::Success || $prof == \Crud\CheckResult::Success) {
        header("Location: " . $page_redirect);
        exit;
    } else {
        setToast("danger", "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer.");
    }
} else {
    if (isset($_GET['redirect']))
        setToast("primary", "Vous n'êtes pas connecté.<br/>Veuillez vous connecter.");
}
