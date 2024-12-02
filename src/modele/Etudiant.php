<?php

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
	 * Get the value of numero
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * Get the value of nom
	 */
	public function getNom(): string
	{
		return $this->nom;
	}

	/**
	 * Get the value of prenom
	 */
	public function getPrenom(): string
	{
		return $this->prenom;
	}

	/**
	 * Get the value of annee_obtention
	 */
	public function getAnneeObtention(): ?DateTime
	{
		return $this->annee_obtention;
	}

	/**
	 * Get the value of login
	 */
	public function getLogin(): string
	{
		return $this->login;
	}

	/**
	 * Get the value of mdp
	 */
	public function getMdp(): string
	{
		return $this->mdp;
	}

	/**
	 * Get the value of classe
	 */
	public function getClasse(): Classe
	{
		return $this->classe;
	}

	/**
	 * Get the value of activite
	 */
	public function isActivite(): bool
	{
		return $this->activite;
	}
}
