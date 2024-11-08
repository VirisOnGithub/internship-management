<?php

namespace SqlOperations;

require_once('src/db/Database.php');
require_once('src/db/SqlFactory.php');

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

function insertLine(string $table, array $params): void
{
	$lock = new \Database\Connection();

	$query = $lock->getDB()->prepare(\SqlFactory\insert($table, $params));

	bindValues($query, $params);

	$query->execute();
}

function getLines(string $table): array
{
	$lock = new \Database\Connection();

	$query = $lock->getDB()->prepare("SELECT * FROM " . $table . ";");

	$query->execute();

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function getLinesWhere(string $table, array $params): array
{
	$lock = new \Database\Connection();

	$query = $lock->getDB()->prepare(\SqlFactory\select($table, $params));

	bindValues($query, $params);

	$query->execute();

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function deleteLinesWhere(string $table, array $params): void
{
	$lock = new \Database\Connection();

	$query = $lock->getDB()->prepare(\SqlFactory\delete($table, $params));

	bindValues($query, $params);

	$query->execute();
}

function updateLinesWhere(string $table, array $update_params, array $where_params): void
{
	$lock = new \Database\Connection();

	$query = $lock->getDB()->prepare(\SqlFactory\update($table, $update_params, $where_params));

	bindValues($query, $update_params);
	bindValues($query, $where_params);

	$query->execute();
}
