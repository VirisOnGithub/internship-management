<?php

namespace SqlOperations;

require_once('src/db/Database.php');
require_once('src/db/SqlFactory.php');
require_once('src/Logs.php');

function bindValues($query, array $params): void
{
	foreach ($params as $key => $value) {
		if (is_numeric($value) || is_bool($value)) {
			$query->bindValue(":" . $key, $value, \PDO::PARAM_INT);
		} else {
			$query->bindValue(":" . $key, $value, \PDO::PARAM_STR);
		}
	}
}

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

function getLines(string $table): array
{
	$lock = new \Database\Connection();

	$sql_command = "SELECT * FROM " . $table . ";";

	$query = $lock->getDB()->prepare($sql_command);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "}");

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function getLinesWhere(string $table, array $params): array
{
	$lock = new \Database\Connection();

	$sql_command = \SqlFactory\select($table, $params);

	$query = $lock->getDB()->prepare($sql_command);

	bindValues($query, $params);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "} \nwith parameters : " . var_export($params, true));

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function deleteLinesWhere(string $table, array $params): void
{
	$lock = new \Database\Connection();

	$sql_command = \SqlFactory\delete($table, $params);

	$query = $lock->getDB()->prepare($sql_command);

	bindValues($query, $params);

	$query->execute();

	\Logs\write("Executed SQL command : {" . $sql_command . "} \nwith parameters : " . var_export($params, true));
}

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
