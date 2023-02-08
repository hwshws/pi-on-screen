<?php

namespace php\classes;

class ConfigurationFile extends \php\classes\YAMLFile {
    /**
     * @YamlPath("database.type")
     * @YamlComment("MySQL, MariaDB and SQLite supported")
     */
    public static $databaseType = "sqlite";

    /**
     * @YamlPath("database.host")
     * @YamlComment("The host of the database server. No need to change if type \"sqlite\" is used")
     */
    public static $databaseHost = "";

    /**
     * @YamlPath("database.port")
     * @YamlComment("The port of the database server. No need to change if type \"sqlite\" is used")
     */
    public static $databasePort = "";

    /**
     * @YamlPath("database.username")
     * @YamlComment("The username to connect to the database No need to change if type \"sqlite\" is used")
     */
    public static $databaseUser = "root";

    /**
     * @YamlPath("database.password")
     * @YamlComment("The password to connect to the database No need to change if type \"sqlite\" is used")
     */
    public static $databasePassword = "";

    /**
     * @YamlPath("database.name")
     * @YamlComment("The name of the database. Insert the absolute path if type \"sqlite\" is used")
     */
    public static $databaseName = "database.db";

    /**
     * @YamlPath("application.debug_mode")
     * @YamlComment("Enables/Disables the debug mode")
     */
    public static $applicationDebug = false;

    /**
     * @YamlPath("application.dark_mode")
     * @YamlComment("The prefix of the database tables")
     */
    public static $applicationDarkMode = false;

    /**
     * @YamlPath("application.admin_password")
     * @YamlComment("The prefix of the database tables")
     */
    public static $applicationAdminPassword = "Achtopf";

    /**
     * @YamlPath("application.dev_password")
     * @YamlComment("The prefix of the database tables")
     */
    public static $applicationDevPassword = "Achtopf";
}