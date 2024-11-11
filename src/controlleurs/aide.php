<?php
$help = file_get_contents("../src/help.json");
$help = json_decode($help, true);

$data = [
    "help" => $help
];