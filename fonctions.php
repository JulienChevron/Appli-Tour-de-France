<?php

function majuscule($str){
	$maj = mb_convert_case($str,MB_CASE_UPPER);
	return $maj;
}

function minuscule($str){
	$min = mb_convert_case($str, MB_CASE_LOWER);
	return $min;
}

function majPrenom($str){
	$prenom = ucfirst($str);
	return $prenom;
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
	$str = preg_replace('# \' #', '\'', $str);
	return $str;
}

function prenomCompose($str){
	$str = mb_convert_case($str, MB_CASE_TITLE);
	$str = enleverEspacesInutiles($str);
	return $str;
}

//Retirer les accents
function enleverAccents($str)
{
    $str = preg_replace('#Ç#', 'C', $str);
    $str = preg_replace('#ç#', 'c', $str);
    $str = preg_replace('#è|é|ê|ë#', 'e', $str);
    $str = preg_replace('#È|É|Ê|Ë#', 'E', $str);
    $str = preg_replace('#à|á|â|ã|ä|å#', 'a', $str);
    $str = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $str);
    $str = preg_replace('#ì|í|î|ï#', 'i', $str);
    $str = preg_replace('#Ì|Í|Î|Ï#', 'I', $str);
    $str = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $str);
    $str = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $str);
    $str = preg_replace('#ù|ú|û|ü#', 'u', $str);
    $str = preg_replace('#Ù|Ú|Û|Ü#', 'U', $str);
    $str = preg_replace('#ý|ÿ#', 'y', $str);
    $str = preg_replace('#Ý#', 'Y', $str);
    $str = preg_replace('#œ#', 'oe', $str);
    $str = preg_replace('#Œ#', 'OE', $str);
     
    return ($str);
}

//Vérifier caractères français, interdire caractères spéciaux, ponctuation (à détailler)
function verifierFrancais($str){

    $regex = "/^([a-z\\s'àâçèëéêîôùûü-]+)$/si"; 

    if(preg_match($regex,$str)){
        return true;
    }else{
    	return false;
    }
}

function verifierTypePrenom($str){
	$flag;
	if(preg_match('# #',$str) || preg_match('#-#', $str) || preg_match('#\'#', $str)){
		return 'compose';
	}else{
		return 'normal';
	}

}

function enleverTiretDebut($str)
{
	$str = enleverToutEspaces($str);
	$PremierCaractere = substr($str,0,1);

	while (strcmp($PremierCaractere, "-")==0) {
		$str = substr($str,1);	//supprime le premier caractère
		$PremierCaractere = substr($str,0,1); //stock le nouveau premier caractère
	}
	return $str;
}

function enleverTiretFin($str)
{
	$str = enleverToutEspaces($str);
	$DernierCaractere = substr($str,-1,1);

	while (strcmp($DernierCaractere, "-")==0) {
		$str = substr($str,0,-1);	//supprime le dernier caractère
		$DernierCaractere = substr($str,-1,1); //stock le nouveau premier caractère
	}
	return $str;
}

function unTiretMax($str){
	for ($i=0; $i < strlen($str); $i++) { 
		$str = preg_replace('#--#', '-', $str);	
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


function formaterPrenom($str){
	if(verifierFrancais($str)){
		$str = enleverEspaces($str);
		if(verifierTypePrenom($str) =='compose'){
			$str = prenomCompose($str);
		}else{
			$str = majPrenom($str);
		}
		$str = unTiretMax($str);
		$str = unApostropheMax($str);
		$str = enleverTiretFin($str);
		$str = enleverTiretDebut($str);
		return $str;
	}else{
		return "NON CONFORME";
	}
}

function formaterNom($str){
	if(verifierFrancais($str)){
		$str = enleverAccents($str);
		$str = majuscule($str);
		$str = deuxTiretMax($str);
		$str = unApostropheMax($str);
		$str = enleverTiretFin($str);
		$str = enleverTiretDebut($str);
		return $str;
	}else{
		return "NON CONFORME";
	}
}

?>