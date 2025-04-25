<?php

	function _addslashes( $string )
	{
		return ( (get_magic_quotes_runtime()==1) ) ? $string : addslashes($string);
	}
	
	function _stripslashes($value) {
		if (is_numeric($value)) return $value;
		if (!isset($value)) return "";
		if ($value=="") return "";
		if (get_magic_quotes_runtime() == 1) return $value;
	
		return encodeToUtf8(stripslashes(htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ));
	}
	
	function encodeToUtf8($string) {
		 return mb_convert_encoding($string, "UTF-8", mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true));
	}
	
	
	function connectBDD() {
		$serveur=mysql_connect("localhost","www.hulis","hulis*31");
		$base=mysql_select_db("hulis",$serveur);
		
	}
	
?>