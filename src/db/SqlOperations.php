<?php

namespace SqlOperations;

/**
 * @file SqlOperations.php
 * Execution des requêtes SQL
 */

use DateTime;

require_once('src/db/Database.php');
require_once('src/db/SqlFactory.php');
require_once('src/Logs.php');

/**
 * Applique les valeurs d'une requête SQL avec paramètres
 * @param mixed $query la requête à paramètres
 * @param array $params les paramètres à appliquer
 * @return void
 */
function bindValues($query, array $params): void
{
	foreach ($params as $key => $value) {
		if (is_numeric($value) || is_bool($value)) {
			$query->bindValue(":" . $key, $value, \PDO::PARAM_INT);
		} else if ($value instanceof DateTime) {
			$query->bindValue(":" . $key, $value->format("Y-m-d H:i:s"), \PDO::PARAM_STR);
		} else {
			$query->bindValue(":" . $key, $value, \PDO::PARAM_STR);
		}
	}
}

/**
 * Insére une ligne dans la base de donnée
 * @param string $table la table à modifier
 * @param array $params les paramètres de l'insertion
 * @return string|false false si la requête échoue
 */
function insertLine(string $table, array $params): string|false
{
	$lock = new \Database\Connection();

	$sql_command = \SqlFactory\insert($table, $params);

	$query = $lock->getDB()->prepare($sql_command);

	bindValues($query, $params);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "} \nwith parameters : " . var_export($params, true));

	return $lock->getDB()->lastInsertId();
}

/**
 * Récupère des lignes dans la base de donnée
 * @param string $table la table à lire
 * @return array le tableau associatif des lignes
 */
function getLines(string $table): array
{
	$lock = new \Database\Connection();

	$sql_command = "SELECT * FROM " . $table . ";";

	$query = $lock->getDB()->prepare($sql_command);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "}");

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Récupère des lignes dans la base de donnée avec une condition de sélection stricte
 * @param string $table la table à lire
 * @param array $params les paramètres de la sélection
 * @return array le tableau associatif des lignes
 */
function getLinesWhere(string $table, array $params): array
{
	$lock = new \Database\Connection();

	$sql_command = \SqlFactory\selectWhere($table, $params);

	$query = $lock->getDB()->prepare($sql_command);

	bindValues($query, $params);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "} \nwith parameters : " . var_export($params, true));

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Récupère des lignes dans la base de donnée avec une condition de sélection souple
 * @param string $table la table à lire
 * @param array $params les paramètres de la sélection
 * @return array le tableau associatif des lignes
 */
function getLinesLike(string $table, array $params): array
{
	$lock = new \Database\Connection();

	$sql_command = \SqlFactory\selectLike($table, $params);

	$query = $lock->getDB()->prepare($sql_command);

	if (!empty($params))
		bindValues($query, $params);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "} \nwith parameters : " . var_export($params, true));

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Supprime des lignes dans la base de donnée avec une condition de recherche stricte
 * @param string $table la table à supprimer
 * @param array $params les paramètres de la suppression
 * @return void
 */
function deleteLinesWhere(string $table, array $params): void
{
	$lock = new \Database\Connection();

	$sql_command = \SqlFactory\delete($table, $params);

	$query = $lock->getDB()->prepare($sql_command);

	bindValues($query, $params);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "} \nwith parameters : " . var_export($params, true));
}

/**
 * Mets à jour des lignes dans la base de donnée avec une condition de recherche stricte
 * @param string $table la table à mettre à jour
 * @param array $update_params les paramètres de la mise à jour
 * @param array $where_params les paramètres de la recherche
 * @return void
 */
function updateLinesWhere(string $table, array $update_params, array $where_params): void
{
	$lock = new \Database\Connection();

	$sql_command = \SqlFactory\update($table, $update_params, $where_params);

	$query = $lock->getDB()->prepare($sql_command);

	bindValues($query, $update_params);
	bindValues($query, $where_params);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "} \nwith parameters : " . var_export($update_params, true));
}
