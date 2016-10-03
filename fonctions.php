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

function majusculesPrenomCompose($str){
	$total=strlen($str); // taille de la chaine
	echo 'JAJ : ' . $str[0];
	$str[0] = enleverAccents($str[0]);
	echo enleverAccents($str[0]);
	$str[0] = strtoupper($str[0]);
	for ($i=1 ; $i < $total-1; $i++) { //pour tous les caractères de la chaine (sauf la dernière $total-1, et la première qui est déjà fait)
    	if (($str[$i] == " ") || ($str[$i] == "-") || ($str[$i] == "'")) { //si le caractère est " " ou "-"
    		$str[$i+1] = enleverAccents($str[$i+1]);
        	$str[$i+1] = ucwords($str[$i+1]); //on met en caps le carctère qui suit
        	$i++; //on saute le caractère qu'on vient de mettre en caps
    	}else{
    		$str[$i] = strtolower($str[$i]);
    	}
	}
	return $str;
}

function prenomCompose($str){
	$str = majusculesPrenomCompose($str);
	$str = enleverEspacesInutiles($str);
	return $str;
}

//Retirer les accents
function enleverAccents($str){

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
	if(preg_match('# #',$str) || preg_match('#-#', $str) || preg_match('#\'#', $str)){
		return 'compose';
	}else{
		return 'normal';
	}
}

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

function formaterPrenom($str){
	if(verifierFrancais($str)){
		$str = enleverEspaces($str);
		$str = unTiretMax($str);
		$str = unApostropheMax($str);
		$str = enleverElementDebut($str);
		$str = enleverElementFin($str);
		if(verifierTypePrenom($str) =='compose'){
			$str = prenomCompose($str);
		}else{
			$str = majPrenom($str);
		}
		return $str;
	}else{
		return "NON CONFORME";
	}
}

function formaterNom($str){
	if(verifierFrancais($str)){
		$str = enleverEspaces($str);
		$str = unTiretMax($str);
		$str = unApostropheMax($str);
		$str = enleverElementDebut($str);
		$str = enleverElementFin($str);
		$str = enleverAccents($str);
		$str = majuscule($str);
		$str = enleverEspacesInutiles($str);
		return $str;
	}else{
		return "NON CONFORME";
	}
}

?>