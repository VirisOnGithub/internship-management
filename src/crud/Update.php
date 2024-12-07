<?php

namespace Crud;

/**
 * @file Update.php
 * @brief Ce fichier définit les fonctions de mise à jour des données dans la base de données.
 */

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\updateLinesWhere;

/**
 * Met à jour une classe d'étudiants dans la base de données.
 * @param \Classe $classe la classe à mettre à jour
 * @return void
 */
function updateClasse(\Classe $classe): void
{
	updateLinesWhere(
		"classe",
		\ModeleFactory\tableFromClasse($classe),
		["num_classe" => $classe->getNumero()]
	);
}

/**
 * Met à jour une entreprise dans la base de données.
 * @param \Entreprise $entreprise l'entreprise à mettre à jour
 * @return void
 */
function updateEntreprise(\Entreprise $entreprise): void
{
	updateLinesWhere(
		"entreprise",
		\ModeleFactory\tableFromEntreprise($entreprise),
		["num_entreprise" => $entreprise->getNumero()]
	);
}

/**
 * Met à jour un étudiant dans la base de données.
 * @param \Etudiant $etudiant l'étudiant à mettre à jour
 * @return void
 */
function updateEtudiant(\Etudiant $etudiant): void
{
	updateLinesWhere(
		"etudiant",
		\ModeleFactory\tableFromEtudiant($etudiant),
		["num_etudiant" => $etudiant->getNumero()]
	);
}

/**
 * Met à jour une mission dans la base de données.
 * @param \Mission $mission la mission à mettre à jour
 * @return void
 */
function updateMission(\Mission $mission): void
{
	updateLinesWhere(
		"mission",
		\ModeleFactory\tableFromMission($mission),
		["num_mission" => $mission->getNumero()]
	);
}

/**
 * Met à jour un professeur dans la base de données.
 * @param \Professeur $professeur le professeur à mettre à jour
 * @return void
 */
function updateProfesseur(\Professeur $professeur): void
{
	updateLinesWhere(
		"professeur",
		\ModeleFactory\tableFromProfesseur($professeur),
		["num_prof" => $professeur->getNumero()]
	);
}

/**
 * Met à jour une spécialité dans la base de données.
 * @param \Specialite $specialite la spécialité à mettre à jour
 * @return void
 */
function updateSpecialite(\Specialite $specialite): void
{
	updateLinesWhere(
		"specialite",
		\ModeleFactory\tableFromSpecialite($specialite),
		["num_spec" => $specialite->getNumero()]
	);
}

/**
 * Met à jour un stage dans la base de données.
 * @param \Stage $stage le stage à mettre à jour
 * @return void
 */
function updateStage(\Stage $stage): void
{
	updateLinesWhere(
		"stage",
		\ModeleFactory\tableFromStage($stage),
		["num_stage" => $stage->getNumero()]
	);
}
