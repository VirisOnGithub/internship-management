<?php

namespace Permissions;

/**
 * @file Permissions.php
 * Gestion des permissions des pages
 */

require_once 'src/Login.php';

/**
 * Vérifie si l'utilisateur a les permissions de professeur
 * @return bool true si c'est le cas
 */
function hasAutorisationProfesseur(): bool
{
	$user = \Login\getConnectedUser();
	if (is_null($user))
		return false;
	return $user instanceof \Professeur;
}

/**
 * Vérifie si l'utilisateur a au moins les permissions d'un étudiant spécifique
 * @param int $numero_etudiant le numéro à vérifier
 * @return bool true si c'est le cas ou que l'utilisateur est un professeur
 */
function hasAutorisationEtudiant(int $numero_etudiant): bool
{
	$user = \Login\getConnectedUser();
	if (is_null($user))
		return false;
	if ($user instanceof \Professeur)
		return true;
	return $user->getNumero() == $numero_etudiant;
}
