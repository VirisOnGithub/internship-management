<?php

namespace Logs;

function write($data)
{
	file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/logs.txt", "[" . date("Y-m-d H:i:s") . "] " . $data . "\n", FILE_APPEND | FILE_USE_INCLUDE_PATH);
}
