<?php

namespace Crud;

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\deleteLinesWhere;

function deleteClasse(\Classe $classe): void
{
	deleteLinesWhere("classe", ["num_classe" => $classe->getNumero()]);
}

function deleteEntreprise(\Entreprise $entreprise): void
{
	deleteLinesWhere("entreprise", ["num_entreprise" => $entreprise->getNumero()]);
}

function deleteEtudiant(\Etudiant $etudiant): void
{
	deleteLinesWhere("etudiant", ["num_etudiant" => $etudiant->getNumero()]);
}

function deleteMission(\Mission $mission): void
{
	deleteLinesWhere("mission", ["num_mission" => $mission->getNumero()]);
}

function deleteProfesseur(\Professeur $professeur): void
{
	deleteLinesWhere("professeur", ["num_prof" => $professeur->getNumero()]);
}

function deleteSpecialite(\Specialite $specialite): void
{
	deleteLinesWhere("specialite", ["num_spec" => $specialite->getNumero()]);
}

function deleteStage(\Stage $stage): void
{
	deleteLinesWhere("stage", ["num_stage" => $stage->getNumero()]);
}