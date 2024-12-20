<?php

/**
 * @file Toast.php
 * Gestion des toast (petite fenêtre temporaire en haut de l'écran)
 */

/**
 * Réprésente la couleur d'un toast
 * --------------------
 * |  Toast  | Couleur |
 * |---------|---------|
 * | Error 	 |  Rouge  |
 * | Success |  Vert   |
 * | Info 	 |  Gris   |
 */
enum ToastType: string
{
	case Error = "danger";
	case Success = "success";
	case Info = "primary";
}

/**
 * Affiche un toast sur la page actuelle
 * @param ToastType $toastType la couleur du toast
 * @param string $message le texte affiché dans le toast
 * @return void
 */
function setToast(ToastType $toastType, string $message): void
{
	global $toast_data;

	$toast_data["toast"] = [
		"type" => $toastType->value,
		"message" => $message
	];
}

/**
 * Affiche un toast sur la prochaine page (après une redirection par exemple)
 * @param ToastType $toastType la couleur du toast
 * @param string $message le texte affiché dans le toast
 * @return void
 */
function setNextToast(ToastType $toastType, string $message): void
{
	$_SESSION["last_toast"] = [
		"type" => $toastType->value,
		"message" => $message
	];
}

/**
 * Récupère le toast précédent (s'il existe) et l'affiche sur la page actuelle
 * @return void
 */
function restoreLastToast(): void
{
	global $toast_data;
	if (isset($_SESSION["last_toast"]))
		$toast_data["toast"] = $_SESSION["last_toast"];
	unset($_SESSION["last_toast"]);
}