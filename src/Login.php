<?php

namespace Login;

require_once('src/modele/Etudiant.php');
require_once('src/modele/Professeur.php');
require_once('src/crud/Read.php');

function getConnectedUser(): \Etudiant|\Professeur|null
{
	if (!isset($_SESSION['connected_user'])) {
		$_SESSION['connected_user'] = null;
	}
	return $_SESSION['connected_user'];
}

function isUserConnected(): bool
{
	return !is_null(getConnectedUser());
}

function connectEtudiant(string $login, string $mdp): \Crud\CheckResult
{
	$check = \Crud\checkEtudiant($login, $mdp);
	$result = $check['result'];
	if ($result == \Crud\CheckResult::Success) {
		$_SESSION['connected_user'] = $check['etudiant'];
	}
	return $result;
}

function connectProfesseur(string $login, string $mdp): \Crud\CheckResult
{
	$check = \Crud\checkProfesseur($login, $mdp);
	$result = $check['result'];
	if ($result == \Crud\CheckResult::Success) {
		$_SESSION['connected_user'] = $check['professeur'];
	}
	return $result;
}

function logOut(): void
{
	$_SESSION['connected_user'] = null;
}
