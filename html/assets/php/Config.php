<?php

global $arrConfig;

class Config {
	private static $objInstance;
	private $arrConfig;

	public function __construct() {
		global $arrConfig;
		$this->arrConfig = $arrConfig;
	}

	public static function getConfigArray(): array {
		if (self::$objInstance == null) {
			self::$objInstance = new Config();
		}
		return self::$objInstance->arrConfig;
	}
}
