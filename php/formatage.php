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
		$str = enleverCaracteresSpeciaux($str);
		$str = minuscule($str);
		$str = majusculesPrenom($str);
		$str = enleverEspacesInutiles($str);
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