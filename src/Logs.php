<?php

namespace Logs;

require_once('src/Config.php');

/**
 * Ajoute une ligne au fichier de log spécifié dans la configuration
 * @param mixed $data le texte ou l'erreur à écrire
 * @return void
 */
function write($data): void
{
	$str = "[" . date("Y-m-d H:i:s") . "] " . $data;
	$str = str_replace("\n", "\n\t\t\t\t\t", $str);
	file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/" . getConfig()['logs_output'], $str . "\n", FILE_APPEND | FILE_USE_INCLUDE_PATH);
}
