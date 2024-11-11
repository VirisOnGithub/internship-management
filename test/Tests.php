<?php

set_include_path($_SERVER['DOCUMENT_ROOT']);

require_once('test/Crud.php');
require_once('test/Passwords.php');
require_once('test/Login.php');

session_start();

function test(): void
{
	echo "[Crud]<br/>";
	testCreate();
	testRead();
	testUpdate();
	testDelete();

	echo "[Passwords]<br/>";
	testPasswords();

	echo "[Logins]<br/>";
	testLogin();
}

try {
	test();
	echo "<br/><br/>Tests succesful !";
} catch (Error $e) {
	echo "<br/><br/>Catched error : " . $e;
} catch (Exception $e) {
	echo "<br/><br/>Catched exception : " . $e;
}
