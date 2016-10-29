<?php

function enleverTiretDebut($str){
	//$str = enleverEspaces($str);
	$PremierCaractere = substr($str,0,1);

	while (strcmp($PremierCaractere, "-")==0) {
		$str = substr($str,1);	//supprime le premier caractère
		$PremierCaractere = substr($str,0,1); //stock le nouveau premier caractère
	}
	return $str;
}

function enleverTiretFin($str){
	//$str = enleverToutEspaces($str);
	$DernierCaractere = substr($str,-1,1);

	while (strcmp($DernierCaractere, "-")==0) {
		$str = substr($str,0,-1);	//supprime le dernier caractère
		$DernierCaractere = substr($str,-1,1); //stock le nouveau premier caractère
	}
	return $str;
}

function enleverEspaceDebut($str){
	$PremierCaractere = substr($str,0,1);

	while (strcmp($PremierCaractere, " ")==0) {
		$str = substr($str,1);	//supprime le premier caractère
		$PremierCaractere = substr($str,0,1); //stock le nouveau premier caractère
	}
	return $str;
}

function enleverEspaceFin($str){
	$DernierCaractere = substr($str,-1,1);

	while (strcmp($DernierCaractere, " ")==0) {
		$str = substr($str,0,-1);	//supprime le dernier caractère
		$DernierCaractere = substr($str,-1,1); //stock le nouveau premier caractère
	}
	return $str;
}

function enleverElementDebut($str){
	while(strcmp(substr($str,0,1), " ")==0 || strcmp(substr($str,0,1), "-")==0){
		$str = enleverTiretDebut($str);
		$str = enleverEspaceDebut($str);
	}
	return $str;
}

function enleverElementFin($str){
	while(strcmp(substr($str,-1,1), " ")==0 || strcmp(substr($str,-1,1), "-")==0){
		$str = enleverTiretFin($str);
		$str = enleverEspaceFin($str);
	}
	return $str;
}

function enleverEspaces($str){
	$str = preg_replace('/\s{2,}/', ' ', $str);
	return $str;
}

function enleverToutEspaces($str){
	$str = preg_replace('/\s{1,}/', '', $str);
	return $str;
}

function enleverEspacesInutiles($str){
	$str = preg_replace('# - #', '-', $str);
	$str = preg_replace('# -- #', '--', $str);
	$str = preg_replace('# \' #', '\'', $str);
	return $str;
}

?>