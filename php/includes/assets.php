<?php

//fonction de connexion à la base de données.
function connexionBDD(){
	try{
		$bdd = new PDO('mysql:host=spartacus.iutc3.unicaen.fr;dbname=projet_agilea;charset=utf8','projet_agilea','7UxRWSGqpFpBfrFh');
	    return $bdd;
    }
	catch(Exception $e){
		die('Erreur de connexion à la base de données'.$e->getMessage());
    }
}	

 function IsEmail($email)
 {
      $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
      return (($value === 0) || ($value === false)) ? false : true;
 }
 
 function afficheArray($array){
	echo'<PRE>';
	print_r($array);
	echo'</PRE>';
 }
?>