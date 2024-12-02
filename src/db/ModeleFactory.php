<?php

namespace ModeleFactory;

require_once('src/modele/Classe.php');
require_once('src/modele/Etudiant.php');
require_once('src/modele/Entreprise.php');
require_once('src/modele/Mission.php');
require_once('src/modele/Professeur.php');
require_once('src/modele/Specialite.php');
require_once('src/modele/Stage.php');

/**
 * Crée une Classe à partir d'un tableau associatif
 * @param mixed $raw_data le tableau associatif contenant les informations
 * @return \Classe la nouvelle Classe
 */
function createClasseFromTable($raw_data): \Classe
{
	return new \Classe(
		(int) $raw_data['num_classe'],
		$raw_data['nom_classe']
	);
}

/**
 * Crée un Etudiant à partir d'un tableau associatif
 * @param mixed $raw_data le tableau associatif contenant les informations
 * @return \Etudiant le nouvel Etudiant
 */
function createEtudiantFromTable($raw_data): \Etudiant
{
	$etudiant = new \Etudiant(
		(int) $raw_data['num_etudiant'],
		$raw_data['nom_etudiant'],
		$raw_data['prenom_etudiant'],
		new \DateTime($raw_data['annee_obtention'] . "-01-01") ?? "now",
		$raw_data['login_etudiant'],
		$raw_data['mdp_etudiant'],
		createClasseFromTable($raw_data),
		(bool) $raw_data['en_activite']
	);

	if (is_null($raw_data['annee_obtention']))
		$etudiant->setAnneeObtention(null);

	return $etudiant;
}

/**
 * Crée une Entreprise à partir d'un tableau associatif
 * @param mixed $raw_data le tableau associatif contenant les informations
 * @return \Entreprise la nouvelle Entreprise
 */
function createEntrepriseFromTable($raw_data): \Entreprise
{
	return new \Entreprise(
		$raw_data['num_entreprise'],
		$raw_data['raison_sociale'],
		$raw_data['nom_contact'],
		$raw_data['nom_resp'],
		$raw_data['rue_entreprise'],
		$raw_data['cp_entreprise'],
		$raw_data['ville_entreprise'],
		$raw_data['tel_entreprise'],
		$raw_data['fax_entreprise'],
		$raw_data['email_entreprise'],
		$raw_data['observation'],
		$raw_data['site_entreprise'],
		$raw_data['niveau'],
		$raw_data['en_activite']
	);
}

/**
 * Crée une Mission à partir d'un tableau associatif
 * @param mixed $raw_data le tableau associatif contenant les informations
 * @return \Mission la nouvelle Mission
 */
function createMissionFromTable($raw_data): \Mission
{
	return new \Mission(
		$raw_data['num_mission'],
		$raw_data['libelle'],
		createStageFromTable($raw_data)
	);
}

/**
 * Crée un Professeur à partir d'un tableau associatif
 * @param mixed $raw_data le tableau associatif contenant les informations
 * @return \Professeur le nouveau Professeur
 */
function createProfesseurFromTable($raw_data): \Professeur
{
	return new \Professeur(
		$raw_data['num_prof'],
		$raw_data['nom_prof'],
		$raw_data['prenom_prof'],
		$raw_data['login_prof'],
		$raw_data['mdp_prof'],
		$raw_data['email_prof']
	);
}

/**
 * Crée une Specialite à partir d'un tableau associatif
 * @param mixed $raw_data le tableau associatif contenant les informations
 * @return \Specialite la nouvelle Specialite
 */
function createSpecialiteFromTable($raw_data): \Specialite
{
	return new \Specialite(
		$raw_data['num_spec'],
		$raw_data['libelle']
	);
}

/**
 * Crée un Stage à partir d'un tableau associatif
 * @param mixed $raw_data le tableau associatif contenant les informations
 * @return \Stage le nouveau Stage
 */
function createStageFromTable($raw_data): \Stage
{
	return new \Stage(
		$raw_data['num_stage'],
		new \DateTime($raw_data['debut_stage']),
		new \DateTime($raw_data['fin_stage']),
		$raw_data['type_stage'],
		$raw_data['desc_projet'],
		$raw_data['observation_stage'],
		createEtudiantFromTable($raw_data),
		createProfesseurFromTable($raw_data),
		createEntrepriseFromTable($raw_data)
	);
}





/**
 * Sérialise une Classe en tableau associatif
 * @param \Classe $classe la Classe à sérialiser
 * @return array le tableau associatif contenant les attributs
 */
function tableFromClasse(\Classe $classe): array
{
	return [
		"num_classe" => $classe->getNumero(),
		"nom_classe" => $classe->getNom()
	];
}

/**
 * Sérialise un Etudiant en tableau associatif
 * @param \Etudiant $etudiant l'Etudiant à sérialiser
 * @return array le tableau associatif contenant les attributs
 */
function tableFromEtudiant(\Etudiant $etudiant): array
{
	return [
		"num_etudiant" => $etudiant->getNumero(),
		"nom_etudiant" => $etudiant->getNom(),
		"prenom_etudiant" => $etudiant->getPrenom(),
		"annee_obtention" => $etudiant-> getAnneeObtention() ? $etudiant->getAnneeObtention()->format('Y'): null,
		"login_etudiant" => $etudiant->getLogin(),
		"mdp_etudiant" => $etudiant->getMdp(),
		"num_classe" => $etudiant->getClasse()->getNumero(),
		"en_activite" => $etudiant->isActivite()
	];
}

/**
 * Sérialise une Entreprise en tableau associatif
 * @param \Entreprise $entreprise l'Entreprise à sérialiser
 * @return array le tableau associatif contenant les attributs
 */
function tableFromEntreprise(\Entreprise $entreprise): array
{
	return [
		"num_entreprise" => $entreprise->getNumero(),
		"raison_sociale" => $entreprise->getRaisonSociale(),
		"nom_contact" => $entreprise->getNomContact(),
		"nom_resp" => $entreprise->getNomResponsable(),
		"rue_entreprise" => $entreprise->getRue(),
		"cp_entreprise" => $entreprise->getCodePostal(),
		"ville_entreprise" => $entreprise->getVille(),
		"tel_entreprise" => $entreprise->getTelephone(),
		"fax_entreprise" => $entreprise->getFax(),
		"email_entreprise" => $entreprise->getEmail(),
		"observation" => $entreprise->getObservations(),
		"site_entreprise" => $entreprise->getLienSite(),
		"niveau" => $entreprise->getNiveauEtude(),
		"en_activite" => $entreprise->isEnActivite()
	];
}

/**
 * Sérialise une Mission en tableau associatif
 * @param \Mission $mission la Mission à sérialiser
 * @return array le tableau associatif contenant les attributs
 */
function tableFromMission(\Mission $mission): array
{
	return [
		"num_mission" => $mission->getNumero(),
		"libelle" => $mission->getDescription(),
		"num_stage" => $mission->getStage()->getNumero()
	];
}

/**
 * Sérialise un Professeur en tableau associatif
 * @param \Professeur $professeur le Professeur à sérialiser
 * @return array le tableau associatif contenant les attributs
 */
function tableFromProfesseur(\Professeur $professeur): array
{
	return [
		"num_prof" => $professeur->getNumero(),
		"nom_prof" => $professeur->getNom(),
		"prenom_prof" => $professeur->getPrenom(),
		"login_prof" => $professeur->getLogin(),
		"mdp_prof" => $professeur->getMdp(),
		"email_prof" => $professeur->getEmail()
	];
}

/**
 * Sérialise une Specialite en tableau associatif
 * @param \Specialite $specialite la Specialite à sérialiser
 * @return array le tableau associatif contenant les attributs
 */
function tableFromSpecialite(\Specialite $specialite): array
{
	return [
		"num_spec" => $specialite->getNumero(),
		"libelle" => $specialite->getNom()
	];
}

/**
 * Sérialise un Stage en tableau associatif
 * @param \Stage $stage le Stage à sérialiser
 * @return array le tableau associatif contenant les attributs
 */
function tableFromStage(\Stage $stage): array
{
	return [
		"num_stage" => $stage->getNumero(),
		"debut_stage" => $stage->getDebut(),
		"fin_stage" => $stage->getFin(),
		"type_stage" => $stage->getType(),
		"desc_projet" => $stage->getDescription(),
		"observation_stage" => $stage->getObservation(),
		"num_etudiant" => $stage->getStagiaire()->getNumero(),
		"num_prof" => $stage->getProfesseur()->getNumero(),
		"num_entreprise" => $stage->getEntreprise()->getNumero()
	];
}