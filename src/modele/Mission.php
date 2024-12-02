<?php

require_once('Stage.php');

class Mission
{
	private int $numero;
	private string $description;
	private Stage $stage;

	public function __construct(int $numero, string $description, Stage $stage)
	{
		$this->numero = $numero;
		$this->description = $description;
		$this->stage = $stage;
	}

	/**
	 * Get the value of numero
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * Get the value of description
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Get the value of stage
	 */
	public function getStage(): Stage
	{
		return $this->stage;
	}
}