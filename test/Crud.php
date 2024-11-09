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
}

function testCreate(): void
{
	// TODO
}

function testDelete(): void
{
	// TODO
}
