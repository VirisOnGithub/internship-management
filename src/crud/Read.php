<?php

namespace Crud;

/**
 * @file Read.php
 * Opérations de lecture de la base de données
 */

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');
require_once('src/modele/ClassesProf.php');
require_once('src/crud/CheckResult.php');

use function SqlOperations\getLines;
use function SqlOperations\getLinesWhere;
use function SqlOperations\getLinesLike;

/**
 * Récupère les Classes de la base de données
 * @return Classe [ ] un tableau de classe
 */
function getClasses(): array
{
	$classes = [];
	foreach (getLines("classe") as $classe_line) {
		array_push($classes, \ModeleFactory\createClasseFromTable($classe_line));
	}
	return $classes;
}

/**
 * Récupère les entreprises de la base de données
 * @return Entreprise [ ] un tableau d'entreprises
 */
function getEntreprises(): array
{
	$entreprises = [];
	$spec_entreprises = getLines("spec_entreprise JOIN specialite USING(num_spec)");
	foreach (getLines("entreprise") as $entreprise_line) {
		$entreprise = \ModeleFactory\createEntrepriseFromTable($entreprise_line);
		array_push($entreprises, $entreprise);

		// on ajoute les spécialités aux entreprises
		foreach ($spec_entreprises as $spec_entreprise) {
			if ($spec_entreprise['num_entreprise'] == $entreprise->getNumero()) {
				$entreprise->ajouterSpecialite(\ModeleFactory\createSpecialiteFromTable($spec_entreprise));
			}
		}
	}
	return $entreprises;
}

/**
 * Récupère les étudiants de la base de données
 * @return Etudiant [ ] un tableau d'étudiants
 */
function getEtudiants(): array
{
	$etudiants = [];
	foreach (getLines("etudiant JOIN classe USING(num_classe)") as $etudiant_ligne) {
		array_push($etudiants, \ModeleFactory\createEtudiantFromTable($etudiant_ligne));
	}
	return $etudiants;
}

/**
 * Récupère les missions de la base de données
 * @return Mission [ ] un tableau de missions
 */
function getMissions(): array
{
	$missions = [];
	foreach (getLines("mission JOIN stage USING(num_stage) JOIN entreprise USING(num_entreprise) JOIN professeur USING(num_prof) JOIN etudiant USING(num_etudiant) JOIN classe USING(num_classe)") as $mission_line) {
		array_push($missions, \ModeleFactory\createMissionFromTable($mission_line));
	}
	return $missions;
}

/**
 * Récupère les professeurs de la base de données
 * @return Professeur [ ] un tableau de professeurs
 */
function getProfesseurs(): array
{
	$professeurs = [];
	foreach (getLines("professeur") as $professeur_line) {
		array_push($professeurs, \ModeleFactory\createProfesseurFromTable($professeur_line));
	}
	return $professeurs;
}

/**
 * Récupère les spécialités de la base de données
 * @return Specialite [ ] un tableau de spécialités
 */
function getSpecialites(): array
{
	$specialites = [];
	foreach (getLines("specialite") as $specialite_line) {
		array_push($specialites, \ModeleFactory\createSpecialiteFromTable($specialite_line));
	}
	return $specialites;
}

/**
 * Récupère les stages de la base de données
 * @return Stage [ ] un tableau de stages
 */
function getStages(): array
{
	$stages = [];
	foreach (getLines("stage JOIN entreprise USING(num_entreprise) JOIN professeur USING(num_prof) JOIN etudiant USING(num_etudiant) JOIN classe USING(num_classe)") as $stage_line) {
		array_push($stages, \ModeleFactory\createStageFromTable($stage_line));
	}
	return $stages;
}

/**
 * Récupère une classe spécifique de la base de donnée
 * @param $id le numéro de la classe
 * @return Classe ou null si la classe n'a pas été trouvée
 */
function getClasseById(int $id): ?\Classe
{
	$classe = getLinesWhere("classe", ["num_classe" => $id]);
	if (empty($classe))
		return null;
	return \ModeleFactory\createClasseFromTable($classe[0]);
}

/**
 * Récupère une entreprise spécifique de la base de donnée
 * @param $id le numéro de l'entreprise
 * @return Entreprise ou null si l'entreprise n'a pas été trouvée
 */
function getEntrepriseById(int $id): ?\Entreprise
{
	$entreprise = getLinesWhere("entreprise", ["num_entreprise" => $id]);
	if (empty($entreprise))
		return null;
	return \ModeleFactory\createEntrepriseFromTable($entreprise[0]);
}

/**
 * Récupère une entreprise spécifique de la base de donnée et recupère en plus les spécialités de cet entreprise.
 * @param $id le numéro de l'entreprise
 * @return Entreprise ou null si l'entreprise n'a pas été trouvée
 */
function getEntrepriseByIdWithSpecialites(int $id): ?\Entreprise
{
	$entreprise = getLinesWhere("entreprise", ["num_entreprise" => $id]);
	if (empty($entreprise))
		return null;
	$entreprise = \ModeleFactory\createEntrepriseFromTable($entreprise[0]);

	// on ajoute les spécialités aux entreprises
	foreach (getLinesWhere("spec_entreprise JOIN specialite USING(num_spec)", ["num_entreprise" => $entreprise->getNumero()]) as $spec_entreprise) {
		$entreprise->ajouterSpecialite(\ModeleFactory\createSpecialiteFromTable($spec_entreprise));
	}
	return $entreprise;
}

/**
 * Récupère un étudiant spécifique de la base de donnée
 * @param $id le numéro de l'étudiant
 * @return Etudiant ou null si l'étudiant n'a pas été trouvé
 */
function getEtudiantById(int $id): ?\Etudiant
{
	$etudiant = getLinesWhere("etudiant JOIN classe USING(num_classe)", ["num_etudiant" => $id]);
	if (empty($etudiant))
		return null;
	return \ModeleFactory\createEtudiantFromTable($etudiant[0]);
}

/**
 * Récupère une mission spécifique de la base de donnée
 * @param $id le numéro de la mission
 * @return Mission ou null si la mission n'a pas été trouvée
 */
function getMissionById(int $id): ?\Mission
{
	$mission = getLinesWhere("mission JOIN stage USING(num_stage) JOIN entreprise USING(num_entreprise) JOIN professeur USING(num_prof) JOIN etudiant USING(num_etudiant) JOIN classe USING(num_classe)", ["num_mission" => $id]);
	if (empty($mission))
		return null;
	return \ModeleFactory\createMissionFromTable($mission[0]);
}

/**
 * Récupère un professeur spécifique de la base de donnée
 * @param $id le numéro du professeur
 * @return Professeur ou null si le professeur n'a pas été trouvé
 */
function getProfesseurById(int $id): ?\Professeur
{
	$professeur = getLinesWhere("professeur", ["num_prof" => $id]);
	if (empty($professeur))
		return null;
	return \ModeleFactory\createProfesseurFromTable($professeur[0]);
}

/**
 * Récupère une spécialité spécifique de la base de donnée
 * @param $id le numéro de la spécialité
 * @return Specialite ou null si la spécialité n'a pas été trouvée
 */
function getSpecialiteById(int $id): ?\Specialite
{
	$specialite = getLinesWhere("specialite", ["num_spec" => $id]);
	if (empty($specialite))
		return null;
	return \ModeleFactory\createSpecialiteFromTable($specialite[0]);
}

/**
 * Récupère un stage spécifique de la base de donnée
 * @param $id le numéro du stage
 * @return Stage ou null si le stage n'a pas été trouvé
 */
function getStageById(int $id): ?\Stage
{
	$stage = getLinesWhere("stage JOIN entreprise USING(num_entreprise) JOIN professeur USING(num_prof) JOIN etudiant USING(num_etudiant) JOIN classe USING(num_classe)", ["num_stage" => $id]);
	if (empty($stage))
		return null;
	return \ModeleFactory\createStageFromTable($stage[0]);
}

/**
 * Récupère les classes d'un professeur
 * @pre le professeur doit exister dans la base de données
 * @param int $prof_id le numéor du professeur
 * @return ClassesProf les classe du professeur
 */
function getProfesseurClasses(int $prof_id): \ClassesProf
{
	$classes = [];
	$classe_principale = null;
	foreach (getLinesWhere("prof_classe JOIN classe USING(num_classe)", ["num_prof" => $prof_id]) as $classe_line) {
		$nouvelle_classe = \ModeleFactory\createClasseFromTable($classe_line);
		if ((int) $classe_line['est_prof_principal'] == 1) {
			$classe_principale = $nouvelle_classe;
		} else {
			array_push($classes, $nouvelle_classe);
		}
	}
	return new \ClassesProf(getProfesseurById($prof_id), $classe_principale, $classes);
}

/**
 * Recherche une entreprise sur plusieurs critères
 * @param string $nom le nom de l'entreprise cherchée
 * @param string $ville le nom de la ville de l'entreprise cherché
 * @param Specialite[] $specialites les spécialités de l'entreprise cherchée
 * @return Entreprise [ ] un tableau d'entreprise (potentiellement vide)
 */
function chercherEntreprisesParCritères(string $nom, string $ville, array $specialites): array
{
	if (empty($nom) && empty($ville) && empty($specialites))
		return getEntreprises();

	$criteres = [];
	if (!empty($nom))
		$criteres['raison_sociale'] = $nom;
	if (!empty($ville))
		$criteres['ville_entreprise'] = $ville;

	// on rajoute les % pour la recherche
	foreach ($criteres as $key => $value) {
		$criteres[$key] = "%" . $value . "%";
	}

	$entreprises = [];
	$spec_entreprises = getLines("spec_entreprise JOIN specialite USING(num_spec)");
	foreach (getLinesLike("entreprise", $criteres) as $entreprise_line) {
		$entreprise = \ModeleFactory\createEntrepriseFromTable($entreprise_line);

		$ajouter = false;

		// on ajoute les spécialités aux entreprises
		foreach ($spec_entreprises as $spec_entreprise) {
			if ($spec_entreprise['num_entreprise'] == $entreprise->getNumero()) {
				$entreprise->ajouterSpecialite(\ModeleFactory\createSpecialiteFromTable($spec_entreprise));
				// si dans la recherche, on ajoute également l'entreprise
				if (in_array($spec_entreprise['num_spec'], $specialites, true))
					$ajouter = true;
			}
		}

		if (empty($specialites) || $ajouter) {
			array_push($entreprises, $entreprise);
		}
	}
	return $entreprises;
}

/**
 * Vérifie la validité du login et du mot de passe
 * @return array{etudiant: Etudiant, result: CheckResult}
 */
function checkEtudiant(string $login, string $mdp): array
{
	$etu_ligne = getLinesWhere("etudiant JOIN classe USING(num_classe)", ["login_etudiant" => $login]);
	if (empty($etu_ligne))
		return ["etudiant" => null, "result" => CheckResult::NotFound];
	$etu = \ModeleFactory\createEtudiantFromTable($etu_ligne[0]);
	if (password_verify($mdp, $etu->getMdp()))
		return ["etudiant" => $etu, "result" => CheckResult::Success];
	return ["etudiant" => null, "result" => CheckResult::WrongPassword];
}

/**
 * Vérifie la validité du login et du mot de passe
 * @return array{professeur: Professeur, result: CheckResult}
 */
function checkProfesseur(string $login, string $mdp): array
{
	$prof_ligne = getLinesWhere("professeur", ["login_prof" => $login]);
	if (empty($prof_ligne))
		return ["professeur" => null, "result" => CheckResult::NotFound];
	$prof = \ModeleFactory\createProfesseurFromTable($prof_ligne[0]);
	if (password_verify($mdp, $prof->getMdp()))
		return ["professeur" => $prof, "result" => CheckResult::Success];
	return ["professeur" => null, "result" => CheckResult::WrongPassword];
}
