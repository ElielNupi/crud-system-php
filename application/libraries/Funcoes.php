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

	function createSlug($string)
	{
		if (is_string($string)) {
			$string = $this->limparCaracteresEspeciais($string);

			$replace = array(
				'/[^a-z0-9-]/'    => '-',
				'/-+/'            => '-',
				'/\-{2,}/'        => ''
			);
			$string = preg_replace(array_keys($replace), array_values($replace), $string);
		}
		return $string;
	}

	function limparCaracteresEspeciais($string)
	{
		if (is_string($string)) {
			$string = $this->removerCaracteresEspeciais($string);
			$string = strtolower(trim(utf8_decode($string)));

			$before = 'ÜüÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRrºª\'\"´`./°';
			$after  = 'uuaaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr         ';
			$string = strtr($string, utf8_decode($before), $after);
			$string = preg_replace('/[^a-z0-9_ ]/i', '', $string);
		}
		return $string;
	}

	function removerCaracteresEspeciais($string)
	{
		$search =  explode(",", "°,õ,Õ,ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u,ã,Ã,Ç,Á,É,Í,Ó,Ú,À,È,Ì,Ò,Ù,Ä,Ë,Ï,Ö,Ü,Ÿ,Â,Ê,Î,Ô,Û,Å,E,I,Ø,U");
		$replace = explode(",", "o,o,O,c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u,a,A,C,A,E,I,O,U,A,E,I,O,U,A,E,I,O,U,Y,A,E,I,O,U,A,E,I,O,U,A");

		$string = str_replace($search, $replace, $string);
		return $string;
	}
}

?>
