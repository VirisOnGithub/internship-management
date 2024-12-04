<?php

/**
 * @file Specialite.php
 * Contient la classe Specialite
 */

class Specialite
{
	private int $numero;
	private string $nom;

	/**
	 * Constructeur par défaut
	 * @param int $numero le numéro de la spécialité (-1 si inconnu)
	 * @param string $nom le nom de la spécialité
	 */
	public function __construct(int $numero, string $nom)
	{
		$this->numero = $numero;
		$this->nom = $nom;
	}

	/**
	 * @return int le numéro de la spécialité
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * @return string le nom de la spécialité
	 */
	public function getNom(): string
	{
		return $this->nom;
	}
}
