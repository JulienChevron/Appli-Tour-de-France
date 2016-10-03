<?php

function unTiretMax($str){
	for ($i=0; $i < strlen($str); $i++) { 
		$str = preg_replace('#--#', '-', $str);	
		$str = preg_replace('#- -#', '--', $str);
	}
	return $str;
}	
function deuxTiretMax($str){
	while (substr_count($str, "-")>2) { 
		$str = preg_replace('#--#', '-', $str);
		$str = preg_replace('#- -#', '--', $str);
	}
	return $str;
}
function unApostropheMax($str){
	for ($i=0; $i < strlen($str); $i++) { 
		$str = preg_replace('#\'\'#', '\'', $str);	
	}
	return $str;
}	

?>