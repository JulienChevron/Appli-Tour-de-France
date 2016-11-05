<?php

function majuscule($str){
	$maj = mb_strtoupper($str,"UTF-8");
	return $maj;
}

function minuscule($str){
	$min = mb_strtolower($str,"UTF-8");
	return $min;
}

function majLettre($str){
    $str = enleverAccentsMin($str);
    $dtr = enleverAccentsMaj($str);
    $str = majuscule($str);
    return $str;
}

function majusculesPrenom($str){
    $prenom = "";
    $lettre = "";
    $lettre2 = "";
    $i=0;
    $total = strlen($str);
    $lettre = mb_substr($str, 0,1,"UTF-8");
    if(strcmp($lettre,"'")==0){
        $lettre2 = mb_substr($str, 1,1,"UTF-8");
        $lettre2 = majLettre($lettre2);
        $prenom = $prenom . $lettre . $lettre2;
        $i=2;
    }else{
        $lettre = majLettre($lettre);
        $prenom = $prenom . $lettre;
        $i=1;
    }
	for ($i; $i < $total; $i++) { //pour tous les caractères de la chaine (sauf la dernière $total-1, et la première qui est déjà fait)
    	$lettre = mb_substr($str, $i,1,"UTF-8");
        if (($lettre == " ") || ($lettre == "-") || ($lettre == "'")) { //si le caractère est " " ou "-"
        	$lettre2 = mb_substr($str, $i+1,1,"UTF-8");
            $lettre2 = majLettre($lettre2);
            $prenom = $prenom . $lettre . $lettre2;
        	$i++; //on saute le caractère qu'on vient de mettre en caps
    	}else{
        	$lettre = minuscule($lettre);
            $prenom = $prenom . $lettre;
    	}
	}
	return $prenom;
}

//Retirer les accents
function enleverAccentsMin($str){

  	//  $str = preg_replace('#Ç#', 'C', $str);
    $str = preg_replace('#ç#', 'c', $str);
    $str = preg_replace('#è|é|ê|ë#', 'e', $str);
    $str = preg_replace('#^è|é|ê|ë$#', 'e', $str);
    //$str = preg_replace('#È|É|Ê|Ë#', 'E', $str);
    $str = preg_replace('#à|á|â|ã|ä|å#', 'a', $str);
    //$str = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $str);
    $str = preg_replace('#ì|í|î|ï#', 'i', $str);
    //$str = preg_replace('#Ì|Í|Î|Ï#', 'I', $str);
    $str = preg_replace('#ð|ò|ó|ô|õ|ö|ø#', 'o', $str);
    //$str = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $str);
    $str = preg_replace('#ù|ú|û|ü#', 'u', $str);
    //$str = preg_replace('#Ù|Ú|Û|Ü#', 'U', $str);
    $str = preg_replace('#ý|ÿ#', 'y', $str);
    //$str = preg_replace('#Ý#', 'Y', $str);
     
    return ($str);
}

function enleverAccentsMaj($str){

    $str = preg_replace('#Ç#', 'C', $str);
  //  $str = preg_replace('#è|é|ê|ë#', 'e', $str);
    $str = preg_replace('#È|É|Ê|Ë#', 'E', $str);
    //$str = preg_replace('#à|á|â|ã|ä|å#', 'a', $str);
    $str = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $str);
    //$str = preg_replace('#ì|í|î|ï#', 'i', $str);
    $str = preg_replace('#Ì|Í|Î|Ï#', 'I', $str);
    //$str = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $str);
    $str = preg_replace('#Ò|Ó|Ô|Õ|Ö|Ø#', 'O', $str);
    //$str = preg_replace('#ù|ú|û|ü#', 'u', $str);
    $str = preg_replace('#Ù|Ú|Û|Ü#', 'U', $str);
    //$str = preg_replace('#ý|ÿ#', 'y', $str);
    $str = preg_replace('#Ý#', 'Y', $str);
     
    return ($str);
}

function enleverCaracteresSpeciaux($str){

    $str = preg_replace('#œ#', 'oe', $str);
    $str = preg_replace('#Œ#', 'OE', $str);
    $str = preg_replace('#æ#', 'ae', $str);
    $str = preg_replace('#Æ#', 'AE', $str);
    $str = preg_replace('#ñ#', 'n', $str);
    $str = preg_replace('#Ñ#', 'N', $str);
     
    return ($str);
}

?>