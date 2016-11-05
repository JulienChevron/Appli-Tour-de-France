<?php
//Vérifier caractères français, interdire caractères spéciaux, ponctuation (à détailler)
function verifierFrancais($str){
    //$regex = "/^([œŒæÆa-zs'æñÑÈÉÊËàâçèëéêîôùûü-]\\D)+$/si"; 
    $regex = "#^[a-zA-ZéàèêùôîïœŒæÆñÑÈÉÊËàâçèëéêîôùûüø'\\s-]*$#i";
    if(preg_match($regex,$str)){
        return true;
    }else{
        return false;
    }
}
function verifierReste($str){
    $regex = "#[œŒæÆa-zA-Z]#";
    return preg_match($regex, $str);
}
function verifierTaille($str){
    if(strlen($str)>30){
        return false;
    }else{
        return true;
    }
}
?>