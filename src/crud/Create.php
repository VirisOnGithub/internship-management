<?php

namespace Crud;

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\insertLine;

/**
 * Crée une classe dans la base de données
 * @param \Classe $classe la classe à insérer
 * @return int le numéro de la Classe créée
 */
function createClasse(\Classe $classe): int
{
	$params = \ModeleFactory\tableFromClasse($classe);
	// num_classe est un auto_increment
	if ($classe->getNumero() == -1)
		unset($params['num_classe']);

	return (int) insertLine("classe", $params);
}

/**
 * Crée une entreprise dans la base de données
 * @param \Entreprise $entreprise l'entreprise à insérer
 * @return int le numéro de l'Entreprise créée
 */
function createEntreprise(\Entreprise $entreprise): int
{
	$params = \ModeleFactory\tableFromEntreprise($entreprise);
	// num_entreprise est un auto_increment
	if ($entreprise->getNumero() == -1)
		unset($params['num_entreprise']);

	$entreprise_id = (int) insertLine("entreprise", $params);

	foreach ($entreprise->getSpecialites() as $specialite) {
		insertLine("spec_entreprise", [
			"num_entreprise" => $entreprise_id,
			"num_spec" => $specialite->getNumero()
		]);
	}

	return $entreprise_id;
}

/**
 * Crée un étudiant dans la base de données. Le mot de passe doit être hashé.
 * @param \Etudiant $etudiant l'étudiant à insérer
 * @return int le numéro de l'Etudiant créé
 */
function createEtudiant(\Etudiant $etudiant): int
{
	$params = \ModeleFactory\tableFromEtudiant($etudiant);
	// num_etudiant est un auto_increment
	if ($etudiant->getNumero() == -1)
		unset($params['num_etudiant']);
	if($etudiant->getAnneeObtention() instanceof \DateTime)
		$params['annee_obtention'] = $etudiant->getAnneeObtention()->format('Y');

	return (int) insertLine("etudiant", $params);
}

/**
 * Crée une mission dans la base de données
 * @param \Mission $mission la mission à insérer
 * @return int le numéro de la Mission créée
 */
function createMission(\Mission $mission): int
{
	$params = \ModeleFactory\tableFromMission($mission);
	// num_mission est un auto_increment
	if ($mission->getNumero() == -1)
		unset($params['num_mission']);

	return (int) insertLine("mission", $params);
}

/**
 * Crée un professeur dans la base de données. Le mot de passe doit être hashé.
 * @param \Professeur $professeur le professeur à insérer
 * @return int le numéro du Professeur créé
 */
function createProfesseur(\Professeur $professeur): int
{
	$params = \ModeleFactory\tableFromProfesseur($professeur);
	// num_prof est un auto_increment
	if ($professeur->getNumero() == -1)
		unset($params['num_prof']);

	return (int) insertLine("professeur", $params);
}

/**
 * Crée une specialite dans la base de données
 * @param \Specialite $specialite la specialite à insérer
 * @return int le numéro de la Specialite créée
 */
function createSpecialite(\Specialite $specialite): int
{
	$params = \ModeleFactory\tableFromSpecialite($specialite);
	// num_spec est un auto_increment
	if ($specialite->getNumero() == -1)
		unset($params['num_spec']);

	return (int) insertLine("specialite", $params);
}

/**
 * Crée un stage dans la base de données.
 * @param \Stage $stage le stage à insérer
 * @return int le numéro du Stage créé
 */
function createStage(\Stage $stage): int
{
	$params = \ModeleFactory\tableFromStage($stage);
	// num_stage est un auto_increment
	if ($stage->getNumero() == -1)
		unset($params['num_stage']);

	return (int) insertLine("stage", $params);
}

// TODO: prof_classe