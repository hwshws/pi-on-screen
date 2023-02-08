<?php
/*
 * This file will load every class in the php folder.
 * Also it will load the autoload form composer.
 */

use php\classes\ConfigurationFile;
use php\classes\Database;

date_default_timezone_set('Europe/Berlin');
define("__ROOT__", realpath(dirname(__FILE__)."/.."));

require_once __ROOT__ . '/vendor/autoload.php';

require_once __ROOT__.'/php/classes/YAMLFile.php';
require_once __ROOT__.'/php/classes/ConfigurationFile.php';
require_once __ROOT__.'/php/classes/Database.php';

new ConfigurationFile(__ROOT__ . '/config.yml');
Database::init();


if (ConfigurationFile::$applicationDebug) {
    error_reporting(E_ALL);
    ini_set('display_errors', true);
} else {
    error_reporting(E_ERROR);
    ini_set('display_errors', false);
}

if (substr(ConfigurationFile::$applicationAdminPassword, 0, 5) !== "hash:") {
    $strHashedPassword = "hash:" . password_hash(substr(ConfigurationFile::$applicationAdminPassword, 5), PASSWORD_DEFAULT);
    ConfigurationFile::$applicationAdminPassword = $strHashedPassword;
    ConfigurationFile::save();
}
if (substr(ConfigurationFile::$applicationDevPassword, 0, 5) != "hash:") {
    $strHashedPassword = "hash:" . password_hash(substr(ConfigurationFile::$applicationDevPassword, 5), PASSWORD_DEFAULT);
    ConfigurationFile::$applicationDevPassword = $strHashedPassword;
    ConfigurationFile::save();
}
