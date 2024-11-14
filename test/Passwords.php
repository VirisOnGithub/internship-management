<?php

require_once('src/crud/Read.php');
require_once('src/crud/Update.php');

function testProfesseursPasswords() {
	$rehash = 0;
	$etudiants = Crud\getEtudiants();
	foreach ($etudiants as $etudiant) {
		if(password_needs_rehash($etudiant->getMdp(), PASSWORD_BCRYPT)){
			// on part ici du principe que l'utilisateur n'a pas encore modifié son mot de passe par défaut
			$etudiant->setMdp($etudiant->getLogin());
			Crud\updateEtudiant($etudiant);
			$rehash++;
		}
	}
	echo "&emsp;Rehashed " . $rehash . " etudiants passwords<br/>";
}

function testEtudiantsPasswords() {
	$rehash = 0;
	$professeurs = Crud\getProfesseurs();
	foreach ($professeurs as $professeur) {
		if(password_needs_rehash($professeur->getMdp(), PASSWORD_BCRYPT)){
			// on part ici du principe que l'utilisateur n'a pas encore modifié son mot de passe par défaut
			$professeur->setMdp($professeur->getLogin());
			Crud\updateProfesseur($professeur);
			$rehash++;
		}
	}
	echo "&emsp;Rehashed " . $rehash . " professeurs passwords<br/>";
}

function testPasswords(): void {
	testEtudiantsPasswords();
	testProfesseursPasswords();
}