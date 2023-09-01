<?php
require_once 'vendor/autoload.php';

class PhpSpreadSheet
{
    public $file_mimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    public function formatandoToCsv()
    {
		try {
			if (isset($_FILES['file']['name']) && in_array($_FILES['files']['name'], $files_mimes)) {
				$arr_file = explode('.', $_FILES['file']['name']);
				$extension = end($arr_file);
	
				if ('csv' == $extension) {
					$reader = new PhpOfficePhpSpreadsheetReaderCsv();
				} else {
					$reader = new PhpOfficePhpSpreadsheetReaderXlsx();
				}
	
				$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
				$sheetData = $spreadsheet->getActiveSheet()->toArray();
	
				if (!empty($sheetData)) {
					for ($i=1; $i<count($sheetData); $i++) {
						$nome = $sheetData[$i][1];
						$email = $sheetData[$i][2];
						$this->load->model("Usuarios_model", "usuar
						ios");
						echo $nome;
						echo $email;
						// nome, email, telefone, dt_nascimento
						$this->usuarios->importar("usuarios", array (
							"nome" => $nome, 
							"telefone" => $telefone, 
							"email" => $email, 
							"dt_nascimento" => $dt_nascimento )
						);
					}
					$retorno = "ok";
				} else {
					$retorno = "erro";
				}
			}
		} catch(Exception $e) {
			$retorno = "ERRO DATABASE: ". $e->getMessage() . "\n";
		}
		return $retorno;
    }
}
