<?php

/**
 * @file ClassesProf.php
 * Contient la classe ClassesProf
 */

require_once 'src/modele/Professeur.php';
require_once 'src/modele/Classe.php';

/**
 * @class ClassesProf
 * Les classes d'un professeur
 */
class ClassesProf
{
	private Professeur $professeur;
	private ?Classe $classe_principale;
	private array $classes;

	/**
	 * Constructeur par défaut
	 * @param Professeur $professeur le professeur
	 * @param Classe $classe_principale la classe principale
	 * @param array $classes les classes
	 */
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
	 * @return Professeur le professeur
	 */
	public function getProfesseur(): Professeur
	{
		return $this->professeur;
	}

	/**
	 * @return Classe|null la classe principale (si elle existe)
	 */
	public function getClassePrincipale(): ?Classe
	{
		return $this->classe_principale;
	}

	/**
	 * @return Classe [ ] les classes du professeur (sans compter la classe principale)
	 */
	public function getClasses(): array
	{
		return $this->classes;
	}
}
