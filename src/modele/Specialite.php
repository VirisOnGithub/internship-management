<?php

class Specialite
{
	private int $numero;
	private string $nom;

	public function __construct(int $numero, string $nom)
	{
		$this->numero = $numero;
		$this->nom = $nom;
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
}