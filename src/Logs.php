<?php

namespace Logs;

function write($data)
{
	$str = "[" . date("Y-m-d H:i:s") . "] " . $data;
	$str = str_replace("\n", "\n\t\t\t\t\t", $str);
	file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/logs.txt", $str . "\n", FILE_APPEND | FILE_USE_INCLUDE_PATH);
}
