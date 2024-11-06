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
	 * Set the value of description
	 */
	public function setDescription(string $description): self
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of stage
	 */
	public function getStage(): Stage
	{
		return $this->stage;
	}

	/**
	 * Set the value of stage
	 */
	public function setStage(Stage $stage): self
	{
		$this->stage = $stage;

		return $this;
	}
}