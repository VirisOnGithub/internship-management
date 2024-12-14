<?php

require_once 'src/crud/Read.php';
require_once 'src/RequireLogin.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $stage = Crud\getStageById($id);
    $data = [
        'stage' => $stage
    ];
} else {
    header('Location: index.php');
}