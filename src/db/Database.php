<?php

namespace Database;

/**
 * @file Database.php
 * Gestion de la connexion à la base de données
 */

require_once("src/Config.php");

/**
 * @class Connection
 * Réprésente la connexion à la base de données
 */
class Connection
{
	private \PDO $db;

	/**
	 * Constructeur par défaut.
	 * Se connecte à la base de données
	 */
	public function __construct()
	{
		try {
			$config = getConfig();
			$host = $config['db_host'];
			$user = $config['db_user'];
			$password = $config['db_password'];
			$db_name = $config['db_name'];
			// Connexion à la bdd
			$this->db = new \PDO("mysql:host=$host;dbname=$db_name", $user, $password);
			$this->db->exec('SET NAMES "UTF8"');
		} catch (\PDOException $e) {
			\Logs\write($e);
			die();
		}
	}

	/**
	 * @return \PDO le driver de la base de données
	 */
	public function getDB(): \PDO
	{
		return $this->db;
	}
}
