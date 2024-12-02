<?php

/**
 * Redirige le client sur une page correspondant au code http souhaité
 * @param int $code le code http
 * @return never l'exécution se termine à la fin de la fonction
 */
function redirectError(int $code): never
{
    http_response_code($code);
    header("Location: index.php?page=" . $code);
    exit();
}
