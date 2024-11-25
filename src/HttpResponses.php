<?php

function redirectError(int $code): void
{
    http_response_code($code);
    header("Location: index.php?page=" . $code);
    exit();
}
