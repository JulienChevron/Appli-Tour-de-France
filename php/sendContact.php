<?php

if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['message']) && !empty($_POST['message'])) {
	
$numero = (isset($_POST['numero']) && !empty($_POST['numero']))?$_POST['numero']:"Non renseigné";
$nom = $_POST['nom'];
$mail = $_POST['mail'];
$tel = (isset($_POST['tel']) && !empty($_POST['tel']))?$_POST['tel']:"Non renseigné";
$message = $_POST['message'];
 
$texte = $nom." vous a envoyé un message de demande.\n".$message."\n Son numéro d'affillation est ".$numero."\nNumero de téléphone:".$tel;
 
$to = 'projetPHP@yopmail.com';
$objet = "Demande de renseignements"; //Met l'objet que tu veux
 
/* En-têtes de l'e-mail */
$headers = "From: ".$nom." \r\n\r\n";
  
	/* Envoi de l'e-mail */
	if(mail($to, $objet, $texte, $headers)){
		echo '<meta charset="utf-8"/>Mail envoyé avec succès !';
		
	}else {
				echo "Une erreur est survenue lors de l'envoi";
	}
}
else{
	echo 'error';
	//header('Location: formContact.php');
}
?>