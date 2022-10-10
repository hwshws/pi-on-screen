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

	/**
	 * This function will return true if its night
	 * @return bool
	 */
	public static function isInDarkMode(){
		$intHour = (int)date('H');
		return $intHour >= 20 || $intHour <= 6;
//		return false;
	}
}
