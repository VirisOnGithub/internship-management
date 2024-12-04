<?php

/**
 * @file Professeur.php
 * Contient la classe Professeur
 */

class Professeur
{
	private int $numero;
	private string $nom;
	private string $prenom;
	private string $login;
	private string $mdp;
	private string $email;

	/**
	 * Constructeur par défaut
	 * @param int $numero le numéro du professeur
	 * @param string $nom le nom du professeur
	 * @param string $prenom le prénom du professeur
	 * @param string $login le login du professeur
	 * @param string $mdp le mot de passe du professeur
	 * @param string $email l'email du professeur
	 */
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
	 * @return int le numéro du professeur
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * @return string le nom (de famille) du professeur
	 */
	public function getNom(): string
	{
		return $this->nom;
	}

	/**
	 * @return string le prénom du professeur
	 */
	public function getPrenom(): string
	{
		return $this->prenom;
	}

	/**
	 * @return string le login du professeur
	 */
	public function getLogin(): string
	{
		return $this->login;
	}

	/**
	 * @return string le mot de passe du professeur
	 */
	public function getMdp(): string
	{
		return $this->mdp;
	}

	/**
	 * @return string l'email du professeur
	 */
	public function getEmail(): string
	{
		return $this->email;
	}
}
