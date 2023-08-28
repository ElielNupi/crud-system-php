<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcoes 
{
	function getValorArray($chave, $array, $casocontrario = '')
	{
		if (is_array($array)) {
			if (array_key_exists($chave, $array)) {
				if (!is_array($array[$chave])) {
					if ((strval($array[$chave]) == '0' || trim($array[$chave]) == "")) {
						return $casocontrario;
					}
				}
				return $array[$chave];
			} else {
				return $casocontrario;
			}
		}
		return FALSE;
	}
}

?>
