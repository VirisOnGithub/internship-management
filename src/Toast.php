<?php

require_once 'src/Logs.php';

enum ToastType
{
	case Error;
	case Success;
	case Info;
}

function toString(ToastType $type): string
{
	switch ($type) {
		case ToastType::Error:
			return "danger";

		case ToastType::Success:
			return "success";

		case ToastType::Info:
			return "primary";
	}
	return "none";
}

function setToast(ToastType $toastType, string $message): void
{
	global $toast_data;

	$toast_data["toast"] = [
		"type" => toString($toastType),
		"message" => $message
	];
}

function setNextToast(ToastType $toastType, string $message): void
{
	$_SESSION["last_toast"] = [
		"type" => toString($toastType),
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