<?php
$help = file_get_contents("../assets/help.json");
$help = json_decode($help, true);

$data = [
    "help" => $help
];