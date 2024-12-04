<?php

namespace Crud;

/**
 * @file Delete.php
 * Opérations de suppressions de la base de données
 */

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\deleteLinesWhere;

/**
 * Supprime une classe de la base de données
 * @param \Classe $classe la classe à supprimer
 * @return void
 */
function deleteClasse(\Classe $classe): void
{
	deleteLinesWhere("classe", ["num_classe" => $classe->getNumero()]);
}

/**
 * Supprime une entreprise de la base de données
 * @param \Entreprise $entreprise l'entreprise à supprimer
 * @return void
 */
function deleteEntreprise(\Entreprise $entreprise): void
{
	deleteLinesWhere("spec_entreprise", ["num_entreprise" => $entreprise->getNumero()]);
	deleteLinesWhere("entreprise", ["num_entreprise" => $entreprise->getNumero()]);
}

/**
 * Supprime un étudiant de la base de données
 * @param \Etudiant $etudiant l'etudiant à supprimer
 * @return void
 */
function deleteEtudiant(\Etudiant $etudiant): void
{
	deleteLinesWhere("etudiant", ["num_etudiant" => $etudiant->getNumero()]);
}

/**
 * Supprime une mission de la base de données
 * @param \Mission $mission la mission à supprimer
 * @return void
 */
function deleteMission(\Mission $mission): void
{
	deleteLinesWhere("mission", ["num_mission" => $mission->getNumero()]);
}

/**
 * Supprime un professeur de la base de données
 * @param \Professeur $professeur le professeur à supprimer
 * @return void
 */
function deleteProfesseur(\Professeur $professeur): void
{
	deleteLinesWhere("professeur", ["num_prof" => $professeur->getNumero()]);
}

/**
 * Supprime une spécialité de la base de données
 * @param \Specialite $specialite la spécialité à supprimer
 * @return void
 */
function deleteSpecialite(\Specialite $specialite): void
{
	deleteLinesWhere("specialite", ["num_spec" => $specialite->getNumero()]);
}

/**
 * Supprime un stage de la base de données
 * @param \Stage $stage le stage à supprimer
 * @return void
 */
function deleteStage(\Stage $stage): void
{
	deleteLinesWhere("stage", ["num_stage" => $stage->getNumero()]);
}