<?php

require_once('src/crud/Create.php');
require_once('src/crud/Read.php');
require_once('src/crud/Update.php');
require_once('src/crud/Delete.php');

function testRead(): void
{
	Crud\getClasses();
	Crud\getEntreprises();
	Crud\getEtudiants();
	Crud\getMissions();
	Crud\getProfesseurs();
	Crud\getSpecialites();
	Crud\getStages();

	Crud\getClasseById(1);
	Crud\getEntrepriseById(1);
	Crud\getEtudiantById(1);
	Crud\getMissionById(1);
	Crud\getProfesseurById(1);
	Crud\getSpecialiteById(1);
	Crud\getStageById(1);

	Crud\getEntrepriseSpecialites(Crud\getEntrepriseById(1));
	Crud\getProfesseurClasses(Crud\getProfesseurById(1));

	echo "&emsp;Tested read<br/>";
}

function testUpdate(): void
{
	Crud\updateClasse(Crud\getClasses()[0]);
	Crud\updateEntreprise(Crud\getEntreprises()[0]);
	Crud\updateEtudiant(Crud\getEtudiants()[0]);
	Crud\updateMission(Crud\getMissions()[0]);
	Crud\updateProfesseur(Crud\getProfesseurs()[0]);
	Crud\updateSpecialite(Crud\getSpecialites()[0]);
	Crud\updateStage(Crud\getStages()[0]);

	echo "&emsp;Tested update<br/>";
}

function testCreate(): void
{
	Crud\createClasse(new Classe(9999, "Test"));
	// Crud\createEntreprise();
	Crud\createEtudiant(new Etudiant(9999, "Nom", "Prenom", new DateTime(), "nom.pre", password_hash("motdepasse", PASSWORD_BCRYPT), new Classe(9999, "Test"), true));
	// Crud\createMission();
	// Crud\createProfesseur();
	// Crud\createSpecialite();
	// Crud\createStage();

	echo "&emsp;Tested create<br/>";
}

function testDelete(): void
{
	Crud\deleteEtudiant(new Etudiant(9999, "Nom", "Prenom", new DateTime(), "nom.prenom", "motdepasse", new Classe(9999, "Test"), true));
	Crud\deleteClasse(new Classe(9999, "Test"));
	// Crud\deleteEntreprise();
	// Crud\deleteMission();
	// Crud\deleteProfesseur();
	// Crud\deleteSpecialite();
	// Crud\deleteStage();

	echo "&emsp;Tested delete<br/>";
}
