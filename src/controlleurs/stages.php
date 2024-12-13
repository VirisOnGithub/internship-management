<?php
require_once "src/crud/Read.php";
require_once "src/RequireLogin.php";
require_once "src/Permissions.php";

$stages = Crud\getStages();

$data = [
    "stages" => $stages
];