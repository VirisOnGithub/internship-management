<?php

require_once('Classe.php');
require_once('Etudiant.php');
require_once('Entreprise.php');
require_once('Mission.php');
require_once('Professur.php');
require_once('Specialite.php');
require_once('Stage.php');

// résultat de SELECT * FROM Classe;
function createClasseFromTable($raw_data): Classe
{
	return new Classe((int) $raw_data['num_classe'], $raw_data['nom_classe']);
}

// résultat de SELECT * FROM Etudiant JOIN Classe;
function createEtudiantFromTable($raw_data): Etudiant
{
	return new Etudiant((int) $raw_data['num_etudiant'], $raw_data['nom_etudiant'], $raw_data['prenom_etudiant'], (int) $raw_data['annee_obtention'], $raw_data['login'], $raw_data['mdp'], createClasseFromTable($raw_data), (bool) $raw_data['en_activite']);
}

// résultat de SELECT * FROM Entreprise;
function createEntrepriseFromTable($raw_data): Entreprise
{
	return new Entreprise($raw_data['num_entreprise'], $raw_data['raison_sociale'], $raw_data['nom_contact'], $raw_data['nom_resp'], $raw_data['rue_entreprise'], $raw_data['cp_entreprise'], $raw_data['ville_entreprise'], $raw_data['tel_entreprise'], $raw_data['fax_entreprise'], $raw_data['email'], $raw_data['observation'], $raw_data['site_entreprise'], $raw_data['niveau'], $raw_data['en_activite']);
}

// résultat de SELECT * FROM Mission JOIN Stage;
function createMissionFromTable($raw_data): Mission
{
	return new Mission($raw_data['num_mission'], $raw_data['libelle'], createStageFromTable($raw_data));
}

// résultat de SELECT * FROM Professeur;
function createProfesseurFromTable($raw_data): Professeur
{
	return new Professeur($raw_data['num_prof'], $raw_data['nom_prof'], $raw_data['prenom_prof'], $raw_data['login'], $raw_data['mdp'], $raw_data['email']);
}

// résultat de SELECT * FROM Specialite;
function createSpecialiteFromTable($raw_data): Specialite
{
	return new Specialite($raw_data['num_spec'], $raw_data['libelle']);
}

// résultat de SELECT * FROM Stage JOIN Etudiant JOIN Professeur JOIN Entreprise;
function createStageFromTable($raw_data): Stage
{
	return new Stage($raw_data['num_stage'], new DateTime($raw_data['debut_stage']), new DateTime($raw_data['fin']), $raw_data['type_stage'], $raw_data['desc_projet'], $raw_data['observation_stage'], createEtudiantFromTable($raw_data), createProfesseurFromTable($raw_data), createEntrepriseFromTable($raw_data));
}

//TODO: prof_classe spec_entreprise