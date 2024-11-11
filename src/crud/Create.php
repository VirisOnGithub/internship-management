<?php

namespace Crud;

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\insertLine;

function createClasse(\Classe $classe): void
{
	insertLine("classe", \ModeleFactory\tableFromClasse($classe));
}

function createEntreprise(\Entreprise $entreprise): void
{
	insertLine("entreprise", \ModeleFactory\tableFromEntreprise($entreprise));
}

function createEtudiant(\Etudiant $etudiant): void
{
	insertLine("etudiant", \ModeleFactory\tableFromEtudiant($etudiant));
}

function createMission(\Mission $mission): void
{
	insertLine("mission", \ModeleFactory\tableFromMission($mission));
}

function createProfesseur(\Professeur $professeur): void
{
	insertLine("professeur", \ModeleFactory\tableFromProfesseur($professeur));
}

function createSpecialite(\Specialite $specialite): void
{
	insertLine("specialite", \ModeleFactory\tableFromSpecialite($specialite));
}

function createStage(\Stage $stage): void
{
	insertLine("stage", \ModeleFactory\tableFromStage($stage));
}

function createSpecialiteEntreprise(int $num_entreprise, int $num_specialite): void
{
	insertLine("spec_entreprise", ["num_entreprise" => $num_entreprise, "num_spec" => $num_specialite]);
}