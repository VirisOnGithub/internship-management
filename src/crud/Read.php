<?php

namespace Crud;

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\getLines;

function getClasses(): array
{
	$classes = [];
	foreach (getLines("classe") as $classe_line) {
		array_push($classes, \ModeleFactory\createClasseFromTable($classe_line));
	}
	return $classes;
}

function getEntreprises(): array
{
	$entreprises = [];
	foreach (getLines("entreprise") as $entreprise_line) {
		array_push($entreprises, \ModeleFactory\createEntrepriseFromTable($entreprise_line));
	}
	return $entreprises;
}

function getEtudiants(): array
{
	$etudiants = [];
	foreach (getLines("etudiant JOIN classe USING(num_classe)") as $etudiant_ligne) {
		array_push($etudiants, \ModeleFactory\createEtudiantFromTable($etudiant_ligne));
	}
	return $etudiants;
}

function getMissions(): array
{
	$missions = [];
	foreach (getLines("mission JOIN stage USING(num_stage) JOIN entreprise USING(num_entreprise) JOIN professeur USING(num_prof) JOIN etudiant USING(num_etudiant) JOIN classe USING(num_classe)") as $mission_line) {
		array_push($missions, \ModeleFactory\createMissionFromTable($mission_line));
	}
	return $missions;
}

function getProfesseurs(): array
{
	$professeurs = [];
	foreach (getLines("professeur") as $professeur_line) {
		array_push($professeurs, \ModeleFactory\createProfesseurFromTable($professeur_line));
	}
	return $professeurs;
}

function getSpecialites(): array
{
	$specialites = [];
	foreach (getLines("specialite") as $specialite_line) {
		array_push($specialites, \ModeleFactory\createSpecialiteFromTable($specialite_line));
	}
	return $specialites;
}

function getStages(): array
{
	$stages = [];
	foreach (getLines("stage JOIN entreprise USING(num_entreprise) JOIN professeur USING(num_prof) JOIN etudiant USING(num_etudiant) JOIN classe USING(num_classe)") as $stage_line) {
		array_push($stages, \ModeleFactory\createStageFromTable($stage_line));
	}
	return $stages;
}

//TODO: get Objects by ID + spec_entreprise + prof_classe