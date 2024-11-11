<?php

namespace Crud;

require_once('src/db/SqlOperations.php');
require_once('src/db/ModeleFactory.php');

use function SqlOperations\insertLine;

function createClasse(\Classe $classe): int
{
	$params = \ModeleFactory\tableFromClasse($classe);
	// num_classe est un auto_increment
	if ($classe->getNumero() == -1)
		unset($params['num_classe']);

	return (int) insertLine("classe", $params);
}

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
 * Password should be already hashed
 */
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

// TODO: prof_classe