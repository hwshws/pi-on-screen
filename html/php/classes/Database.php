<?php

namespace php\classes;

use mysqli;
use PDO;
use SQLite3;

class Database {
    /**
     * @var PDO
     */
    private static $objConnection;

    public static function init() {
        switch (ConfigurationFile::$databaseType) {
            case "mysql":
                self::$objConnection = new PDO("mysql:host=" . ConfigurationFile::$databaseHost . ";port=" . ConfigurationFile::$databasePort . ";dbname=" . ConfigurationFile::$databaseName, ConfigurationFile::$databaseUser, ConfigurationFile::$databasePassword);
                break;
            case "sqlite":
                self::$objConnection = new PDO("sqlite:" . ConfigurationFile::$databaseName);
                break;
        }

        if (self::$objConnection == null) {
            throw new \Exception("Database connection could not be established");
        }

        self::runMigrations();
    }

    public static function hasTable(string $table) {
        if (ConfigurationFile::$databaseType == "mysql") {
            return self::hasTableMySQL($table);
        } else if (ConfigurationFile::$databaseType == "sqlite") {
            return self::hasTableSQLite($table);
        }

        return false;
    }

    public static function select(string $table, array $arrWhereKeyValue = []) {
        //Generate Query and use it for prepared statement
        $query = "SELECT * FROM " . $table;
        if (count($arrWhereKeyValue) > 0) {
            $query .= " WHERE ";
            foreach ($arrWhereKeyValue as $key => $value) {
                $query .= $key . " = ? AND ";
            }
            $query = substr($query, 0, -5);
        }
        $query .= ";";
        return self::prepareAndExecute($query, $arrWhereKeyValue);
    }

    public static function count(string $table, array $arrWhereKeyValue = []): float {
        //Generate Query and use it for prepared statement
        $query = "SELECT COUNT(*) AS `count` FROM " . $table;
        if (count($arrWhereKeyValue) > 0) {
            $query .= " WHERE ";
            foreach ($arrWhereKeyValue as $key => $value) {
                $query .= $key . " = ? AND ";
            }
            $query = substr($query, 0, -5);
        }
        $query .= ";";
        return self::prepareAndExecute($query, $arrWhereKeyValue)->fetchAll()[0]["count"];
    }

    public static function insert(string $table, array $arrKeyValue) {
        if (!isset($arrKeyValue["id"]) || $arrKeyValue["id"] == null) {
            $arrKeyValue["id"] = self::count($table)+1;
        }

        //Generate Query and use it for prepared statement
        $query = "INSERT INTO " . $table . " (";
        foreach ($arrKeyValue as $key => $value) {
            $query .= $key . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= ") VALUES (";
        foreach ($arrKeyValue as $key => $value) {
            $query .= "?, ";
        }
        $query = substr($query, 0, -2);
        $query .= ");";
        return self::prepareAndExecute($query, $arrKeyValue);
    }

    public static function update(string $table, array $arrKeyValue, array $arrWhereKeyValue = []) {
        //Generate Query and use it for prepared statement
        $query = "UPDATE " . $table . " SET ";
        foreach ($arrKeyValue as $key => $value) {
            $query .= $key . " = ?, ";
        }
        $query = substr($query, 0, -2);
        if (count($arrWhereKeyValue) > 0) {
            $query .= " WHERE ";
            foreach ($arrWhereKeyValue as $key => $value) {
                $query .= $key . " = ? AND ";
            }
            $query = substr($query, 0, -5);
        }
        $query .= ";";
        return self::prepareAndExecute($query, array_merge($arrKeyValue, $arrWhereKeyValue));
    }

    public static function delete(string $table, array $arrWhereKeyValue) {
        //Generate Query and use it for prepared statement
        $query = "DELETE FROM " . $table . " WHERE ";
        foreach ($arrWhereKeyValue as $key => $value) {
            $query .= $key . " = ? AND ";
        }
        $query = substr($query, 0, -5);
        $query .= ";";
        return self::prepareAndExecute($query, $arrWhereKeyValue);
    }

    private static function runMigrations() {
        $folder = __ROOT__ . "/php/database_migrations/" . ConfigurationFile::$databaseType;
        $arrAlreadyMigrated = [];
        if (self::hasTable("migrations")) {
            $arrMigrations = self::select("migrations", []);
            foreach ($arrMigrations as $arrMigration) {
                $arrAlreadyMigrated[] = $arrMigration["filename"];
            }
        }

        $arrFiles = scandir($folder);
        foreach ($arrFiles as $file) {
            if ($file == "." || $file == "..") {
                continue;
            }
            if (in_array($file, $arrAlreadyMigrated)) {
                continue;
            }

            $sql = file_get_contents($folder . "/" . $file);
            self::$objConnection->exec($sql);
            self::insert("migrations", ["filename" => $file, "timestamp" => time()]);
        }
    }

    private static function prepareAndExecute(string $sql, array $arrValues): \PDOStatement {
        $stmt = self::$objConnection->prepare($sql);
        $stmt->execute(array_values($arrValues));
        return $stmt;
    }

    /**
     * @return PDO
     */
    public static function getObjConnection() {
        return self::$objConnection;
    }

    private static function hasTableMySQL(string $table): bool {
        $arrTables = self::select("information_schema.tables", ["table_schema" => ConfigurationFile::$databaseName]);
        foreach ($arrTables as $arrTable) {
            if ($arrTable["table_name"] == $table) {
                return true;
            }
        }
        return false;
    }

    private static function hasTableSQLite(string $table): bool {
        $arrTables = self::select("sqlite_master", ["type" => "table"]);
        foreach ($arrTables as $arrTable) {
            if ($arrTable["name"] == $table) {
                return true;
            }
        }
        return false;
    }
}
