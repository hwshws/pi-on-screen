<?php

class Database {
	private static $objConnection;

	public function __construct() {
		self::$objConnection = new mysqli(Config::getConfigArray()["database"]["host"], Config::getConfigArray()["database"]["username"], Config::getConfigArray()["database"]["password"], Config::getConfigArray()["database"]["database"]);
		if (self::$objConnection->connect_error) {
			ErrorHandler::report("Connection failed: " . self::$objConnection->connect_error);
			die("Connection failed: " . self::$objConnection->connect_error);
		}
	}

	public static function insert(string $table, array $arrData){
		$strQuery = "INSERT INTO " . Config::getConfigArray()["database"]["prefix"] . $table . " (";
		$strQuery .= implode(", ", array_keys($arrData));
		$strQuery .= ") VALUES (";
		$strQuery .= "'" . implode("', '", array_values($arrData)) . "'";
		$strQuery .= ")";

		$objResult = self::query($strQuery);
		return $objResult;
	}

	public static function select(string $table, array $arrColumns = [], array $arrWhere = []){
		$strQuery = "SELECT ";
		if (count($arrColumns) == 0) {
			$strQuery .= "*";
		} else {
			$strQuery .= implode(", ", $arrColumns);
		}
		$strQuery .= " FROM " . Config::getConfigArray()["database"]["prefix"] . $table;
		if (count($arrWhere) > 0) {
			$strQuery .= " WHERE ";
			$arrWhereString = [];
			foreach ($arrWhere as $strColumn => $strValue) {
				$arrWhereString[] = $strColumn . " = '" . $strValue . "'";
			}
			$strQuery .= implode(" AND ", $arrWhereString);
		}

		return self::query($strQuery);
	}

	public static function update(string $table, array $arrData, array $arrWhere){
		$strQuery = "UPDATE " . Config::getConfigArray()["database"]["prefix"] . $table . " SET ";
		$arrDataString = [];
		foreach ($arrData as $strColumn => $strValue) {
			$arrDataString[] = $strColumn . " = '" . $strValue . "'";
		}
		$strQuery .= implode(", ", $arrDataString);
		$strQuery .= " WHERE ";
		$arrWhereString = [];
		foreach ($arrWhere as $strColumn => $strValue) {
			$arrWhereString[] = $strColumn . " = '" . $strValue . "'";
		}
		$strQuery .= implode(" AND ", $arrWhereString);

		return self::query($strQuery);
	}

	public static function delete(string $table, array $arrWhere){
		$strQuery = "DELETE FROM " . Config::getConfigArray()["database"]["prefix"] . $table . " WHERE ";
		$arrWhereString = [];
		foreach ($arrWhere as $strColumn => $strValue) {
			$arrWhereString[] = $strColumn . " = '" . $strValue . "'";
		}
		$strQuery .= implode(" AND ", $arrWhereString);

		return self::query($strQuery);
	}

	private static function query(string $strQuery){
		$objResult = self::$objConnection->query($strQuery);
		if ($objResult === false) {
			ErrorHandler::report("Query failed: " . self::$objConnection->error);
			die("Query failed: " . self::$objConnection->error);
		}
		return $objResult;
	}
}
