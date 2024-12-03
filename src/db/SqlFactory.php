<?php

namespace SqlFactory;

/**
 * @file SqlFactory.php
 * Construction des requêtes SQL
 */

/**
 * Crée une requête d'insertion SQL à partir de paramètres
 * @param string $table la table dans laquelle insérer
 * @param array $params le tableau associatif des attributs
 * @return string la requête
 */
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

/**
 * Crée une requête de sélection SQL avec condition de recherche stricte à partir de paramètres.
 * @param string $table la table dans laquelle chercher
 * @param array $params le tableau associatif des attributs à chercher
 * @return string la requête
 */
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

/**
 * Crée une requête de sélection SQL avec condition de recherche souple à partir de paramètres.
 * @param string $table la table dans laquelle chercher
 * @param array $params le tableau associatif des attributs à chercher
 * @return string la requête
 */
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

/**
 * Crée une requête de suppression SQL avec condition de recherche stricte à partir de paramètres.
 * @param string $table la table dans laquelle supprimer
 * @param array $params le tableau associatif des attributs à chercher
 * @return string la requête
 */
function delete(string $table, array $params): string
{
	$sql = "DELETE FROM `" . $table . "` WHERE ";

	foreach ($params as $key => $value) {
		$sql .= "`" . $key . "` = :" . $key . " AND ";
	}

	$sql = rtrim($sql, "AND ");
	$sql .= ";";

	return $sql;
}

/**
 * Crée une requête de mise à jour de ligne SQL avec condition de recherche stricte à partir de paramètres.
 * @param string $table la table à mettre à jour
 * @param array $update_params le tableau associatif des attributs à modifier
 * @param array $where_params le tableau associatif des lignes qui contiennent les attributs
 * @return string la requête
 */
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
