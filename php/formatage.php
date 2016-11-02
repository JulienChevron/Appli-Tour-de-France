<?php

include('retraitChar.php');
include('verifications.php');
include('formatageChaine.php');
include('gestionCaracteres.php');


function formaterPrenom($str){
	if(verifierFrancais($str)){
		$str = enleverEspaces($str);
		Afficher($str);
		$str = unTiretMax($str);
		Afficher($str);
		$str = unApostropheMax($str);
		Afficher($str);
		$str = enleverElementDebut($str);
		Afficher($str);
		$str = enleverElementFin($str);
		Afficher($str);
		$str = enleverCaracteresSpeciaux($str);
		Afficher($str);
		$str = minuscule($str);
		Afficher($str);
		$str = majusculesPrenom($str);
		Afficher($str);
		$str = enleverEspacesInutiles($str);
		Afficher($str);
		$str = utf8_decode($str);
		Afficher($str);
		if (verifierReste($str)){
			return $str;
		}else{
			return "?";
		}
	}else{
		return "?";
	}
}

function formaterNom($str){
	if(verifierFrancais($str)){
		$str = enleverEspaces($str);
		$str = deuxTiretMax($str);
		$str = unApostropheMax($str);
		$str = enleverElementDebut($str);
		$str = enleverElementFin($str);
		$str = enleverAccentsMaj($str);
		$str = enleverAccentsMin($str);
		$str = enleverCaracteresSpeciaux($str);
		$str = majuscule($str);
		$str = enleverEspacesInutiles($str);
		$str = utf8_decode($str);
		if (verifierReste($str)){
			return $str;
		}else{
			return "?";
		}
	}else{
		return "?";
	}
}

?>