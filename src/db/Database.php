<?php

namespace Database;

require_once("src/Config.php");

/**
 * Réprésente la connexion à la base de données
 */
class Connection
{
	private \PDO $db;

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
			echo 'Erreur : ' . $e->getMessage();
			die();
		}
	}

	public function getDB(): \PDO
	{
		return $this->db;
	}
}
