<?php

namespace Login;

/**
 * @file Login.php
 * Gestion de l'utilisateur actuel
 */

require_once('src/modele/Etudiant.php');
require_once('src/modele/Professeur.php');
require_once('src/crud/Read.php');
require_once('src/crud/CheckResult.php');

/**
 * Retourne l'utilisateur connecté
 * @return \Etudiant|\Professeur|null null si l'utilisateur n'est pas connecté
 */
function getConnectedUser(): \Etudiant|\Professeur|null
{
	if (!isset($_SESSION['connected_user'])) {
		$_SESSION['connected_user'] = null;
	}
	return $_SESSION['connected_user'];
}

/**
 * Vérifie si l'utilisateur est connecté
 * @return bool true si c'est le cas
 */
function isUserConnected(): bool
{
	return !is_null(getConnectedUser());
}

/**
 * Retourne les initiales de l'utilisateur connecté
 * @return string une chaine de caractères vide si l'utilisateur n'est pas connecté
 */
function getFirstLetters(): string
{
	$user = getConnectedUser();
	if (is_null($user)) {
		return '';
	}
	$first_name = $user->getPrenom();
	$last_name = $user->getNom();
	return strtoupper($first_name[0] . $last_name[0]);
}

/**
 * Essaie de connecter un étudiant à partir de ses identifiants
 * @param string $login le login de l'étudiant
 * @param string $mdp le mot de passe de l'étudiant
 * @return \Crud\CheckResult le résultat de l'essai
 */
function connectEtudiant(string $login, string $mdp): \Crud\CheckResult
{
	$check = \Crud\checkEtudiant($login, $mdp);
	$result = $check['result'];
	if ($result == \Crud\CheckResult::Success) {
		$_SESSION['connected_user'] = $check['etudiant'];
	}
	return $result;
}

/**
 * Essaie de connecter un professeur à partir de ses identifiants
 * @param string $login le login du professeur
 * @param string $mdp le mot de passe du professeur
 * @return \Crud\CheckResult le résultat de l'essai
 */
function connectProfesseur(string $login, string $mdp): \Crud\CheckResult
{
	$check = \Crud\checkProfesseur($login, $mdp);
	$result = $check['result'];
	if ($result == \Crud\CheckResult::Success) {
		$_SESSION['connected_user'] = $check['professeur'];
	}
	return $result;
}

/**
 * Déconnecte l'utilisateur.
 * Ne fais rien si l'utilisateur n'est pas connecté
 * @return void
 */
function logOut(): void
{
	$_SESSION['connected_user'] = null;
}
