<?php

require_once('src/Login.php');

function testLogin(): void {

	assert(!Login\isUserConnected());

	assert(Login\connectEtudiant("login_impossible_a_trouver", "motdepasse") == Crud\CheckResult::NotFound);
	assert(Login\connectEtudiant("dursim01", "motdepasse") == Crud\CheckResult::WrongPassword);
	assert(Login\connectEtudiant("dursim01", "dursim01") == Crud\CheckResult::Success);

	assert(Login\isUserConnected());
	assert(Login\getConnectedUser() == Crud\getEtudiantById(33));

	echo "&emsp;Tested log in etudiant<br/>";

	assert(Login\connectProfesseur("login_impossible_a_trouver", "motdepasse") == Crud\CheckResult::NotFound);
	assert(Login\connectProfesseur("gaujul01", "motdepasse") == Crud\CheckResult::WrongPassword);
	assert(Login\connectProfesseur("gaujul01", "gaujul01") == Crud\CheckResult::Success);

	assert(Login\isUserConnected());
	assert(Login\getConnectedUser() == Crud\getProfesseurById(2));
	
	echo "&emsp;Tested log in professeur<br/>";

	Login\logOut();

	assert(!Login\isUserConnected());

	echo "&emsp;Tested log out<br/>";
}
