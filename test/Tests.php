<?php

set_include_path($_SERVER['DOCUMENT_ROOT']);

require_once('test/Crud.php');

function test(): void
{
	testCreate();
	testRead();
	testUpdate();
	testDelete();
}

try {
	test();
	echo "Tests succesful !";
} catch (Error $e) {
	echo "Catched error : " . $e;
} catch (Exception $e) {
	echo "Catched exception : " . $e;
}
