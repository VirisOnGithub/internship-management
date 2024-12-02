<?php

require_once('Etudiant.php');
require_once('Professeur.php');
require_once('Entreprise.php');

class Stage
{
	private int $numero;
	private DateTime $debut;
	private DateTime $fin;
	private string $type;
	private string $description;
	private ?string $observation;
	private Etudiant $stagiaire;
	private Professeur $professeur;
	private Entreprise $entreprise;

	public function __construct(
		int $numero,
		DateTime $debut,
		DateTime $fin,
		string $type,
		string $description,
		?string $observation,
		Etudiant $stagiaire,
		Professeur $professeur,
		Entreprise $entreprise,
	) {
		$this->numero = $numero;
		$this->debut = $debut;
		$this->fin = $fin;
		$this->type = $type;
		$this->description = $description;
		$this->observation = $observation;
		$this->stagiaire = $stagiaire;
		$this->professeur = $professeur;
		$this->entreprise = $entreprise;
	}

	/**
	 * Get the value of numero
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * Get the value of debut
	 */
	public function getDebut(): DateTime
	{
		return $this->debut;
	}

	/**
	 * Get the value of fin
	 */
	public function getFin(): DateTime
	{
		return $this->fin;
	}

	/**
	 * Get the value of type
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * Get the value of description
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Get the value of observation
	 */
	public function getObservation(): ?string
	{
		return $this->observation;
	}

	/**
	 * Get the value of stagiaire
	 */
	public function getStagiaire(): Etudiant
	{
		return $this->stagiaire;
	}

	/**
	 * Get the value of professeur
	 */
	public function getProfesseur(): Professeur
	{
		return $this->professeur;
	}

	/**
	 * Get the value of entreprise
	 */
	public function getEntreprise(): Entreprise
	{
		return $this->entreprise;
	}
}