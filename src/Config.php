<?php

/**
 * @file Config.php
 * Récupère la configuration de l'application
 */

/**
 * Retourne la configuration présente dans le fichier config.ini
 * sous forme de tableau associatif
 * @return array{key: string, value: string}
 */
function getConfig(): array
{
	return parse_ini_file("assets/config.ini");
}
