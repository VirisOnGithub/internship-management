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
	$classe = new Classe(9999, "Test");
	$prof = new Professeur(9999, "prof", "esseur", "profess", "mdp", "m@f.h");
	$etu = new Etudiant(9999, "Nom", "Prenom", new DateTime(), "nom.pre", password_hash("motdepasse", PASSWORD_BCRYPT), $classe, true);
	$entreprise = new Entreprise(9999, "raison", "nom_contact", null, "rue", 69210, "Lyon", "0656768696", "fax", "email@mail.mail", null, null, "BAC+40", false);
	$stage = new Stage(9999, new DateTime(), new DateTime(), "type", "jsp", null, $etu, $prof, $entreprise);
	$spec = new Specialite(9999, "Spec");
	$mission = new Mission(9999, "hsp", $stage);

	Crud\createClasse($classe);
	Crud\createEntreprise($entreprise);
	Crud\createEtudiant($etu);
	Crud\createProfesseur($prof);
	Crud\createSpecialite($spec);
	Crud\createStage($stage);
	Crud\createMission($mission);

	echo "&emsp;Tested create<br/>";
}

function testDelete(): void
{
	$classe = new Classe(9999, "Test");
	$prof = new Professeur(9999, "prof", "esseur", "profess", "mdp", "m@f.h");
	$etu = new Etudiant(9999, "Nom", "Prenom", new DateTime(), "nom.pre", password_hash("motdepasse", PASSWORD_BCRYPT), $classe, true);
	$entreprise = new Entreprise(9999, "raison", "nom_contact", null, "rue", 69210, "Lyon", "0656768696", "fax", "email@mail.mail", null, null, "BAC+40", false);
	$stage = new Stage(9999, new DateTime(), new DateTime(), "type", "jsp", null, $etu, $prof, $entreprise);
	$spec = new Specialite(9999, "Spec");
	$mission = new Mission(9999, "hsp", $stage);

	Crud\deleteMission($mission);
	Crud\deleteStage($stage);
	Crud\deleteSpecialite($spec);
	Crud\deleteProfesseur($prof);
	Crud\deleteEtudiant($etu);
	Crud\deleteClasse($classe);
	Crud\deleteEntreprise($entreprise);

	echo "&emsp;Tested delete<br/>";
}
