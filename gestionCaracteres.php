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


function majusculesPrenomCompose($str){
	$total=strlen($str); // taille de la chaine
	$str[0] = enleverAccents($str[0]);
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

?>