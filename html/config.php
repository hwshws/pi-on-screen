<?php
date_default_timezone_set('Europe/Berlin');

$arrConfig = [
	"database" => [
		"type" => "mysql", //MySQL, MariaDB and SQLite supported
		"host" => "", //The host of the database server. No need to change if type "sqlite" is used
		"port" => "", //The port of the database server. No need to change if type "sqlite" is used
		"username" => "", //The username to connect to the database No need to change if type "sqlite" is used
		"password" => "", //The password to connect to the database No need to change if type "sqlite" is used
		"database" => "", //The name of the database. Insert the absolute path if type "sqlite" is used
		"prefix" => "db_prefix_" //The prefix of the database tables
	],
	"application" => [
		"admin_password" => "Achtopf",
		"debug" => false,
		"dark_mode" => false
	]
];

if ($arrConfig["application"]["debug"]) {
	error_reporting(E_ALL);
	ini_set('display_errors', true);
} else {
	error_reporting(E_ERROR);
	ini_set('display_errors', false);
}

global $arrConfig;
return $arrConfig;
