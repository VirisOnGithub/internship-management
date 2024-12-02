<?php

require_once 'src/modele/Professeur.php';
require_once 'src/modele/Classe.php';

class ClassesProf
{
	private Professeur $professeur;
	private ?Classe $classe_principale;

	private array $classes;

	public function __construct(
		Professeur $professeur,
		Classe $classe_principale,
		array $classes
	) {
		$this->professeur = $professeur;
		$this->classe_principale = $classe_principale;
		$this->classes = $classes;
	}

	/**
	 * Get the value of professeur
	 */
	public function getProfesseur(): Professeur
	{
		return $this->professeur;
	}

	/**
	 * Get the value of classe_principale
	 */
	public function getClassePrincipale(): ?Classe
	{
		return $this->classe_principale;
	}

	/**
	 * Get the value of classes
	 */
	public function getClasses(): array
	{
		return $this->classes;
	}
}