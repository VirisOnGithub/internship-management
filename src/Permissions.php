<?php

namespace Permissions;

require_once 'src/Login.php';

// Retourne vrai si l'utilisateur a les permissions de professeur
function hasAutorisationProfesseur(): bool
{
	$user = Login\getConnectedUser();
	if (is_null($user))
		return false;
	return $user instanceof \Professeur;
}

// Retourne vrai si l'utilisateur a au moins les permissions d'un étudiant spécifique
function hasAutorisationEtudiant(int $numero_etudiant): bool
{
	$user = Login\getConnectedUser();
	if (is_null($user))
		return false;
	if ($user instanceof \Professeur)
		return true;
	return $user->getNumero() == $numero_etudiant;
}
