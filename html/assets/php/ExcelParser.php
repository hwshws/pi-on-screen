<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ExcelParser {
	private $spreadsheet;

	public function __construct(string $filePath) {
		$reader = new Xlsx();
		try {
			$this->spreadsheet = $reader->load($filePath);
			$this->spreadsheet->setActiveSheetIndex(0);
		} catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
			ErrorHandler::exceptionHandler($e);
		} catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
			ErrorHandler::exceptionHandler($e);
		}
	}

	public function getCellValue(string $cell, string $default = null) {
		return $this->spreadsheet->getActiveSheet()->getCell($cell)->getValue() ?? $default;
	}
}
