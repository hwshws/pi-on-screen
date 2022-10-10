<?php

class ErrorHandler {
	public function __construct() {
		set_error_handler([$this, "errorHandler"]);
		set_exception_handler([$this, "exceptionHandler"]);
	}

	public static function report(string $message){
		self::logError($message);
		echo('<div class="alert alert-danger" role="alert"> ' . $message . '</div>');
	}

	public static function errorHandler($intErrorNumber, $strErrorMessage, $strErrorFile, $intErrorLine) {
		$strError = "Error: " . $strErrorMessage . " in " . $strErrorFile . " on line " . $intErrorLine;
		self::logError($strError);
	}

	public static function exceptionHandler($objException) {
		$strError = "Exception: " . $objException->getMessage() . " in " . $objException->getFile() . " on line " . $objException->getLine();
		self::logError($strError);
	}

	private static function logError($strError) {
		$strError = date("Y-m-d H:i:s") . " " . $strError . "\n";
		file_put_contents("error.log", $strError, FILE_APPEND);
	}
}
