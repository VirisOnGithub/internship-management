<?php

namespace Crud;

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\updateLinesWhere;

function updateClasse(\Classe $classe): void
{
	updateLinesWhere(
		"classe",
		\ModeleFactory\tableFromClasse($classe),
		["num_classe" => $classe->getNumero()]
	);
}

function updateEntreprise(\Entreprise $entreprise): void
{
	updateLinesWhere(
		"entreprise",
		\ModeleFactory\tableFromEntreprise($entreprise),
		["num_entreprise" => $entreprise->getNumero()]
	);
}

function updateEtudiant(\Etudiant $etudiant): void
{
	updateLinesWhere(
		"etudiant",
		\ModeleFactory\tableFromEtudiant($etudiant),
		["num_etudiant" => $etudiant->getNumero()]
	);
}

function updateMission(\Mission $mission): void
{
	updateLinesWhere(
		"mission",
		\ModeleFactory\tableFromMission($mission),
		["num_mission" => $mission->getNumero()]
	);
}

function updateProfesseur(\Professeur $professeur): void
{
	updateLinesWhere(
		"professeur",
		\ModeleFactory\tableFromProfesseur($professeur),
		["num_prof" => $professeur->getNumero()]
	);
}

function updateSpecialite(\Specialite $specialite): void
{
	updateLinesWhere(
		"specialite",
		\ModeleFactory\tableFromSpecialite($specialite),
		["num_spec" => $specialite->getNumero()]
	);
}

function updateStage(\Stage $stage): void
{
	updateLinesWhere(
		"stage",
		\ModeleFactory\tableFromStage($stage),
		["num_stage" => $stage->getNumero()]
	);
}
