<?php
//Page pour formater le texte saisi (le rend conforme pour la bdd)
include('retraitChar.php');
include('verifications.php');
include('formatageChaine.php');
include('gestionCaracteres.php');

//Appel de toutes les fonctions nécessaires pour formater le prénom
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
		$str = utf8_decode($str);
		if (verifierReste($str) && verifierTaille($str)){
			return $str;
		}else{
			return "?";
		}
	}else{
		return "?";
	}
}
//Appel de toutes les fonctions nécessaires pour formater le nom
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
		if (verifierReste($str) && verifierTaille($str)){
			return $str;
		}else{
			return "?";
		}
	}else{
		return "?";
	}
}
?>