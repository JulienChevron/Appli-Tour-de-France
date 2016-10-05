<?php

include('retraitChar.php');
include('verifications.php');
include('formatageChaine.php');
include('gestionCaracteres.php');


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
		$str = deuxTiretMax($str);
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

function prenomCompose($str){
	$str = majusculesPrenomCompose($str);
	$str = enleverEspacesInutiles($str);
	return $str;
}


?>