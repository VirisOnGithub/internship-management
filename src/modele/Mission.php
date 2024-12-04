<?php

/**
 * @file Mission.php
 * Contient la classe Mission
 */

require_once('Stage.php');

/**
 * @class Mission
 * Une mission de stage
 */
class Mission
{
	private int $numero;
	private string $description;
	private Stage $stage;

	/**
	 * Constructeur par défaut
	 * @param int $numero le numéro de la mission (-1 si inconnu)
	 * @param string $description la description de la mission
	 * @param Stage $stage le stage de la mission
	 */
	public function __construct(int $numero, string $description, Stage $stage)
	{
		$this->numero = $numero;
		$this->description = $description;
		$this->stage = $stage;
	}

	/**
	 * @return int le numéro de la mission
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}


	/**
	 * @return string la description de la mission
	 */
	public function getDescription(): string
	{
		return $this->description;
	}


	/**
	 * @return Stage le stage de la mission
	 */
	public function getStage(): Stage
	{
		return $this->stage;
	}
}
