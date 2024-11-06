<?php

class Professeur
{
	private int $numero;
	private string $nom;
	private string $prenom;
	private string $login;
	private string $mdp;
	private string $email;

	public function __construct(
		int $numero,
		string $nom,
		string $prenom,
		string $login,
		string $mdp,
		string $email
	) {
		$this->numero = $numero;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->login = $login;
		$this->mdp = $mdp;
		$this->email = $email;
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
	 * Get the value of email
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 */
	public function setEmail(string $email): self
	{
		$this->email = $email;

		return $this;
	}
}