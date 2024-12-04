<?php

/**
 * @file Stage.php
 */

require_once('Etudiant.php');
require_once('Professeur.php');
require_once('Entreprise.php');

/**
 * @class Stage
 * Un stage dans une entreprise
 */
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

	/**
	 * Constructeur par défaut
	 * @param int $numero le numéro du stage
	 * @param DateTime $debut la date de début
	 * @param DateTime $fin la date de fin
	 * @param string $type le type de stage
	 * @param string $description la description du stage
	 * @param ?string $observation les observations (éventuelles) du stage
	 * @param Etudiant $stagiaire le stagiaire
	 * @param Professeur $professeur le professeur du stage
	 * @param Entreprise $entreprise l'entreprise du stage
	 */
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
	 * @return int le numéro du stage
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * @return DateTime le début du stage
	 */
	public function getDebut(): DateTime
	{
		return $this->debut;
	}

	/**
	 * @return DateTime la fin du stage
	 */
	public function getFin(): DateTime
	{
		return $this->fin;
	}

	/**
	 * @return string le type du stage
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @return string la description du stage
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @return string|null les observations éventuelles
	 */
	public function getObservation(): ?string
	{
		return $this->observation;
	}

	/**
	 * @return Etudiant le stagiaire
	 */
	public function getStagiaire(): Etudiant
	{
		return $this->stagiaire;
	}

	/**
	 * @return Professeur le professeur
	 */
	public function getProfesseur(): Professeur
	{
		return $this->professeur;
	}

	/**
	 * @return Entreprise l'entreprise
	 */
	public function getEntreprise(): Entreprise
	{
		return $this->entreprise;
	}
}
