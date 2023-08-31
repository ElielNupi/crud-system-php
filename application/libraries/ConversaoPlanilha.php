<?php
defined('BASEPATH') or exit('No direct script access allowed');

require './vendor/autoload.php';

class ConversaoPlanilha
{
		var $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function ler_arquivo_usuarios ($arquivo)
    {
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($arquivo);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

        /** Instancia do Read Filter */
        $filterSubset = new MyReadFilterUsuarios();
        $reader->setReadFilter($filterSubset);

        $spreadsheet = $reader->load($arquivo);

        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $arrayCount = count($allDataInSheet);

        $createArray = array(
            'nome',
            'email',
            'dt_nascimento',
            'telefone',
        );

        $makeArray = array(
            'nome' => 'nome',
            'email' => 'email',
            'dt_nascimento' => 'dt_nascimento',
            'telefone' => 'telefone',
        );

        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
            foreach ($dataInSheet as $key => $value) {
                if (in_array(trim($value), $createArray)) {
                    $value = preg_replace('/\s+/', '', $value);
                    if (!empty($value)) {
                        $SheetDataKey[trim($value)] = $key;
                    }
                }
            }
        }

				$dataDiff = array_diff_key($makeArray, $SheetDataKey);
				if (empty($dataDiff)) { 
					$retorno = array();

					for ($i = 2; $i <= $arrayCount; $i++) {
							$nome = $SheetDataKey['nome'];
							$email = $SheetDataKey['email'];
							$dt_nascimento = $SheetDataKey['dt_nascimento'];
							$telefone = $SheetDataKey['telefone'];

							$nome = filter_var(trim($allDataInSheet[$i][$nome]), FILTER_SANITIZE_STRING);
							$email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);
							$dt_nascimento = filter_var(trim($allDataInSheet[$i][$dt_nascimento]), FILTER_SANITIZE_STRING);
							$telefone = filter_var(trim($allDataInSheet[$i][$telefone]), FILTER_SANITIZE_STRING);

							array_push(
								$retorno,
								array(
									'nome' => $nome,
									'email' => $email,
									'dt_nascimento' => $dt_nascimento,
									'telefone' => $telefone
								)
							);
					}

					return array(
						'status' => 'ok',
						'data' => $retorno
					);
					
				} else {
					return array(
						'status' => 'erro',
						'msg' => '<br>Formato da tabela inválido.<br>Verifique as instruções para construir <br>sua tabela no formato aceito pelo sistema.'
					);
				}
    }
}

class MyReadFilterUsuarios implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    public function readCell($column, $row, $worksheetName = '')
    {
        //  Read rows larger than 1 and columns A to E only
        if ($row >= 1) {
            if (in_array($column, range('A', 'Y'))) {
                return true;
            }
        }
        return false;
    }
}

/* End of file ConversaoPlanilha.php */
/* Location: ./application/libraries/ConversaoPlanilha.php */
