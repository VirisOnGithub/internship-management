<?php

/**
 * @file Classe.php
 * Contient la classe Classe
 */

/**
 * @class Classe
 * Une classe d'élèves
 */
class Classe
{
	private int $numero;
	private string $nom;

	/**
	 * Constructeur par défaut
	 * @param int $numero le numéro de la classe (-1 si inconnu)
	 * @param string $nom le nom de la classe
	 */
	public function __construct(int $numero, string $nom)
	{
		$this->numero = $numero;
		$this->nom = $nom;
	}

	/**
	 * @return int le numéro de la classe
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * @return string le nom de la classe
	 */
	public function getNom(): string
	{
		return $this->nom;
	}
}
