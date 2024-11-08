<?php

require_once('Classe.php');

class Etudiant
{
	private int $numero;
	private string $nom;
	private string $prenom;
	private int $annee_obtention;
	private string $login;
	private string $mdp;
	private Classe $classe;
	private bool $activite;

	public function __construct(
		int $numero,
		string $nom,
		string $prenom,
		int $annee_obtention,
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
	 * Set the value of numero
	 */
	public function setNumero(int $numero): self
	{
		$this->numero = $numero;

		return $this;
	}

	/**
	 * Get the value of nom
	 */
	public function getNom(): string
	{
		return $this->nom;
	}

	/**
	 * Set the value of nom
	 */
	public function setNom(string $nom): self
	{
		$this->nom = $nom;

		return $this;
	}

	/**
	 * Get the value of prenom
	 */
	public function getPrenom(): string
	{
		return $this->prenom;
	}

	/**
	 * Set the value of prenom
	 */
	public function setPrenom(string $prenom): self
	{
		$this->prenom = $prenom;

		return $this;
	}

	/**
	 * Get the value of annee_obtention
	 */
	public function getAnneeObtention(): int
	{
		return $this->annee_obtention;
	}

	/**
	 * Set the value of annee_obtention
	 */
	public function setAnneeObtention(int $annee_obtention): self
	{
		$this->annee_obtention = $annee_obtention;

		return $this;
	}

	/**
	 * Get the value of login
	 */
	public function getLogin(): string
	{
		return $this->login;
	}

	/**
	 * Set the value of login
	 */
	public function setLogin(string $login): self
	{
		$this->login = $login;

		return $this;
	}

	/**
	 * Get the value of mdp
	 */
	public function getMdp(): string
	{
		return $this->mdp;
	}

	/**
	 * Set the value of mdp
	 */
	public function setMdp(string $mdp): self
	{
		$this->mdp = $mdp;

		return $this;
	}

	/**
	 * Get the value of classe
	 */
	public function getClasse(): Classe
	{
		return $this->classe;
	}

	/**
	 * Set the value of classe
	 */
	public function setClasse(Classe $classe): self
	{
		$this->classe = $classe;

		return $this;
	}

	/**
	 * Get the value of activite
	 */
	public function isActivite(): bool
	{
		return $this->activite;
	}

	/**
	 * Set the value of activite
	 */
	public function setActivite(bool $activite): self
	{
		$this->activite = $activite;

		return $this;
	}
}
