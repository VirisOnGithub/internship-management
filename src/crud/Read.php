<?php

namespace Crud;

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\getLines;
use function SqlOperations\getLinesWhere;

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

function getClasseById(int $id): ?\Classe
{
	$classe = getLinesWhere("classe", ["num_classe" => $id]);
	if (empty($classe))
		return null;
	return \ModeleFactory\createClasseFromTable($classe[0]);
}

function getEntrepriseById(int $id): ?\Entreprise
{
	$entreprise = getLinesWhere("entreprise", ["num_entreprise" => $id]);
	if (empty($entreprise))
		return null;
	return \ModeleFactory\createEntrepriseFromTable($entreprise[0]);
}

function getEtudiantById(int $id): ?\Etudiant
{
	$etudiant = getLinesWhere("etudiant", ["num_etudiant" => $id]);
	if (empty($etudiant))
		return null;
	return \ModeleFactory\createEtudiantFromTable($etudiant[0]);
}

function getMissionById(int $id): ?\Mission
{
	$mission = getLinesWhere("mission JOIN stage USING(num_stage) JOIN entreprise USING(num_entreprise) JOIN professeur USING(num_prof) JOIN etudiant USING(num_etudiant) JOIN classe USING(num_classe)", ["num_mission" => $id]);
	if (empty($mission))
		return null;
	return \ModeleFactory\createMissionFromTable($mission[0]);
}

function getProfesseurById(int $id): ?\Professeur
{
	$professeur = getLinesWhere("professeur", ["num_prof" => $id]);
	if (empty($professeur))
		return null;
	return \ModeleFactory\createProfesseurFromTable($professeur[0]);
}

function getSpecialiteById(int $id): ?\Specialite
{
	$specialite = getLinesWhere("specialite", ["num_spec" => $id]);
	if (empty($specialite))
		return null;
	return \ModeleFactory\createSpecialiteFromTable($specialite[0]);
}

function getStageById(int $id): ?\Stage
{
	$stage = getLinesWhere("stage JOIN entreprise USING(num_entreprise) JOIN professeur USING(num_prof) JOIN etudiant USING(num_etudiant) JOIN classe USING(num_classe)", ["num_stage" => $id]);
	if (empty($stage))
		return null;
	return \ModeleFactory\createStageFromTable($stage[0]);
}

function getEntrepriseSpecialites(\Entreprise $entreprise): array
{
	$specialites = [];
	foreach (getLinesWhere("spec_entreprise JOIN specialite USING(num_spec)", ["num_entreprise" => $entreprise->getNumero()]) as $specialite_line) {
		array_push($specialites, \ModeleFactory\createSpecialiteFromTable($specialite_line));
	}
	return $specialites;
}

function getProfesseurClasses(\Professeur $professeur): array
{
	$classes = [];
	foreach (getLinesWhere("prof_classe JOIN classe USING(num_classe)", ["num_prof" => $professeur->getNumero()]) as $classe_line) {
		array_push($classes, \ModeleFactory\createClasseFromTable($classe_line));
	}
	return $classes;
}
