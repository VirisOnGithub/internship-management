<?php

require_once 'src/Logs.php';

function setToast(string $type, string $message): void
{
	global $toast_data;

	$toast_data["toast"] = [
		"type" => $type,
		"message" => $message
	];
}

function setNextToast(string $type, string $message): void
{
	$_SESSION["last_toast"] = [
		"type" => $type,
		"message" => $message
	];
}

function restoreLastToast(): void
{
	global $toast_data;
	if (isset($_SESSION["last_toast"]))
		$toast_data["toast"] = $_SESSION["last_toast"];
	unset($_SESSION["last_toast"]);
}