<?php

namespace ModeleFactory;

require_once('src/modele/Classe.php');
require_once('src/modele/Etudiant.php');
require_once('src/modele/Entreprise.php');
require_once('src/modele/Mission.php');
require_once('src/modele/Professeur.php');
require_once('src/modele/Specialite.php');
require_once('src/modele/Stage.php');

// résultat de SELECT * FROM Classe;
function createClasseFromTable($raw_data): \Classe
{
	return new \Classe(
		(int) $raw_data['num_classe'],
		$raw_data['nom_classe']
	);
}

// résultat de SELECT * FROM Etudiant JOIN Classe;
function createEtudiantFromTable($raw_data): \Etudiant
{
	$etudiant = new \Etudiant(
		(int) $raw_data['num_etudiant'],
		$raw_data['nom_etudiant'],
		$raw_data['prenom_etudiant'],
		new \DateTime($raw_data['annee_obtention']."-01-01") ?? "now",
		$raw_data['login_etudiant'],
		$raw_data['mdp_etudiant'],	
		createClasseFromTable($raw_data),
		(bool) $raw_data['en_activite']
	);

	if (is_null($raw_data['annee_obtention']))
		$etudiant->setAnneeObtention(null);

	return $etudiant;
}

// résultat de SELECT * FROM Entreprise;
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

// résultat de SELECT * FROM Mission JOIN Stage;
function createMissionFromTable($raw_data): \Mission
{
	return new \Mission(
		$raw_data['num_mission'],
		$raw_data['libelle'],
		createStageFromTable($raw_data)
	);
}

// résultat de SELECT * FROM Professeur;
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

// résultat de SELECT * FROM Specialite;
function createSpecialiteFromTable($raw_data): \Specialite
{
	return new \Specialite(
		$raw_data['num_spec'],
		$raw_data['libelle']
	);
}

// résultat de SELECT * FROM Stage JOIN Etudiant JOIN Professeur JOIN Entreprise;
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

//TODO: prof_classe spec_entreprise

function tableFromClasse(\Classe $classe): array
{
	return [
		"num_classe" => $classe->getNumero(),
		"nom_classe" => $classe->getNom()
	];
}

function tableFromEtudiant(\Etudiant $etudiant): array
{
	return [
		"num_etudiant" => $etudiant->getNumero(),
		"nom_etudiant" => $etudiant->getNom(),
		"prenom_etudiant" => $etudiant->getPrenom(),
		"annee_obtention" => $etudiant->getAnneeObtention(),
		"login_etudiant" => $etudiant->getLogin(),
		"mdp_etudiant" => $etudiant->getMdp(),
		"num_classe" => $etudiant->getClasse()->getNumero(),
		"en_activite" => $etudiant->isActivite()
	];
}

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

function tableFromMission(\Mission $mission): array
{
	return [
		"num_mission" => $mission->getNumero(),
		"libelle" => $mission->getDescription(),
		"num_stage" => $mission->getStage()->getNumero()
	];
}

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

function tableFromSpecialite(\Specialite $specialite): array
{
	return [
		"num_spec" => $specialite->getNumero(),
		"libelle" => $specialite->getNom()
	];
}

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