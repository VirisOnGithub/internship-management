<?php

function getConfig(): array
{
	return parse_ini_file("assets/config.ini");
}
