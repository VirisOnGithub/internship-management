<?php

/**
 * @file CheckResult.php
 * Contient l'énumération CheckResult
 */

/**
 * @enum CheckResult
 * Le résultat d'une tentative de connexion
 * --------------------
 * |  CheckResult  | 			  Signification 				  |
 * |---------------|----------------------------------------------|
 * | NotFound 	   | L'utilisateur n'existe pas                   |
 * | WrongPassword | L'utilisateur a entré un mot de passe erroné |
 * | Success 	   | L'utilisateur a entré le bon mot de passe    |
 */
enum CheckResult
{
	case NotFound;
	case WrongPassword;
	case Success;
}