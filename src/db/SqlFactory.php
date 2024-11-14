<?php

namespace SqlFactory;

function insert(string $table, array $params): string
{
	$sql = "INSERT INTO `" . $table . "` (";

	foreach ($params as $key => $value) {
		$sql .= "`" . $key . "`, ";
	}

	$sql = rtrim($sql, ", ");
	$sql .= ") VALUES (";

	foreach ($params as $key => $value) {
		$sql .= ":" . $key . ", ";
	}

	$sql = rtrim($sql, ", ");
	$sql .= ");";

	return $sql;
}

function selectWhere(string $table, array $params): string
{
	$sql = "SELECT * FROM " . $table . " WHERE ";

	foreach ($params as $key => $value) {
		$sql .= "`" . $key . "` = :" . $key . " AND ";
	}

	$sql = rtrim($sql, "AND ");
	$sql .= ";";

	return $sql;
}

function selectLike(string $table, array $params): string
{
	$sql = "SELECT * FROM " . $table . (empty($params) ? "" : " WHERE ");

	foreach ($params as $key => $value) {
		$sql .= "`" . $key . "` LIKE :" . $key . " AND ";
	}

	$sql = rtrim($sql, "AND ");
	$sql .= ";";

	return $sql;
}

function delete(string $table, array $params)
{
	$sql = "DELETE FROM `" . $table . "` WHERE ";

	foreach ($params as $key => $value) {
		$sql .= "`" . $key . "` = :" . $key . " AND ";
	}

	$sql = rtrim($sql, "AND ");
	$sql .= ";";

	return $sql;
}

function update(string $table, array $update_params, array $where_params): string
{
	$sql = "UPDATE `" . $table . "` SET ";

	foreach ($update_params as $key => $value) {
		$sql .= "`" . $key . "` = :" . $key . ", ";
	}

	$sql = rtrim($sql, ", ");
	$sql .= " WHERE ";

	foreach ($where_params as $key => $value) {
		$sql .= "`" . $key . "` = :" . $key . " AND ";
	}

	$sql = rtrim($sql, "AND ");
	$sql .= ";";

	return $sql;
}