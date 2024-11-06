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
	private string $observation;
	private Etudiant $stagiaire;
	private Professeur $professeur;
	private Entreprise $entreprise;

	public function __construct(
		int $numero,
		DateTime $debut,
		DateTime $fin,
		string $type,
		string $description,
		string $observation,
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
	 * Set the value of debut
	 */
	public function setDebut(DateTime $debut): self
	{
		$this->debut = $debut;

		return $this;
	}

	/**
	 * Get the value of fin
	 */
	public function getFin(): DateTime
	{
		return $this->fin;
	}

	/**
	 * Set the value of fin
	 */
	public function setFin(DateTime $fin): self
	{
		$this->fin = $fin;

		return $this;
	}

	/**
	 * Get the value of type
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * Set the value of type
	 */
	public function setType(string $type): self
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get the value of description
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 */
	public function setDescription(string $description): self
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of observation
	 */
	public function getObservation(): string
	{
		return $this->observation;
	}

	/**
	 * Set the value of observation
	 */
	public function setObservation(string $observation): self
	{
		$this->observation = $observation;

		return $this;
	}

	/**
	 * Get the value of stagiaire
	 */
	public function getStagiaire(): Etudiant
	{
		return $this->stagiaire;
	}

	/**
	 * Set the value of stagiaire
	 */
	public function setStagiaire(Etudiant $stagiaire): self
	{
		$this->stagiaire = $stagiaire;

		return $this;
	}

	/**
	 * Get the value of professeur
	 */
	public function getProfesseur(): Professeur
	{
		return $this->professeur;
	}

	/**
	 * Set the value of professeur
	 */
	public function setProfesseur(Professeur $professeur): self
	{
		$this->professeur = $professeur;

		return $this;
	}

	/**
	 * Get the value of entreprise
	 */
	public function getEntreprise(): Entreprise
	{
		return $this->entreprise;
	}

	/**
	 * Set the value of entreprise
	 */
	public function setEntreprise(Entreprise $entreprise): self
	{
		$this->entreprise = $entreprise;

		return $this;
	}
}