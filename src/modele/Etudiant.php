<?php

/**
 * @file Etudiant.php
 * Contient la classe Etudiant
 */

require_once('Classe.php');

class Etudiant
{
	private int $numero;
	private string $nom;
	private string $prenom;
	private ?DateTime $annee_obtention;
	private string $login;
	private string $mdp;
	private Classe $classe;
	private bool $activite;

	/**
	 * Constructeur oar défaut
	 * @param int $numero le numéro de l'étudiant (-1 si inconnu)
	 * @param string $nom le nom de l'étudiant
	 * @param string $prenom le prénom de l'étudiant
	 * @param ?DateTime $annee_obtention l'année d'obtention du diplôme visé
	 * @param string $login le login de l'étudiant
	 * @param string $mdp le mot de passe de l'étudiant (hashé)
	 * @param Classe $classe la classe de l'étudiant
	 * @param bool $activite l'activité de l'étudiant
	 */
	public function __construct(
		int $numero,
		string $nom,
		string $prenom,
		?DateTime $annee_obtention,
		string $login,
		string $mdp,
		Classe $classe,
		bool $activite
	) {
		$this->numero = $numero;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->annee_obtention = $annee_obtention;
		$this->login = $login;
		$this->mdp = $mdp;
		$this->classe = $classe;
		$this->activite = $activite;
	}

	/**
	 * @return int le numéro de l'étudiant
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * @return string le nom (de famille) de l'étudiant
	 */
	public function getNom(): string
	{
		return $this->nom;
	}

	/**
	 * @return string le prénom de l'étudiant
	 */
	public function getPrenom(): string
	{
		return $this->prenom;
	}

	/**
	 * @return DateTime|null l'année d'obtention du diplôme visé
	 */
	public function getAnneeObtention(): ?DateTime
	{
		return $this->annee_obtention;
	}


	/**
	 * @return string le login de l'étudiant
	 */
	public function getLogin(): string
	{
		return $this->login;
	}

	/**
	 * @return string le mot de passe de l'étudiant (hashé)
	 */
	public function getMdp(): string
	{
		return $this->mdp;
	}

	/**
	 * @return Classe la classe de l'étudiant
	 */
	public function getClasse(): Classe
	{
		return $this->classe;
	}

	/**
	 * @return bool true si l'étudiant est en activité
	 */
	public function isActivite(): bool
	{
		return $this->activite;
	}
}
