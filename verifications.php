<?php

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

?>