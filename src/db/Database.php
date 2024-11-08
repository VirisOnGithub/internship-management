<?php

namespace Database;

/**
 * Connection to a database which closes when this object is destroyed
 */
class Connection
{
	private \PDO $db;

	private static string $host = "local_db";
	private static string $user = "root";
	private static string $password = "super_strong_password";

	public function __construct()
	{
		try {
			// Connexion à la bdd
			$this->db = new \PDO("mysql:host=" . Connection::$host . ";dbname=bdd_geststages", Connection::$user, Connection::$password);
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
