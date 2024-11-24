<?php 

function redirect401() : void
{
    http_response_code(401);
    header("Location: index.php?page=401");
    exit();
}

function redirect404() : void
{
    http_response_code(404);
    header("Location: index.php?page=404");
    exit();
}