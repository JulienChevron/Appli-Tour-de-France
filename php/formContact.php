<?php 
    $pwd='../';
    include("includes/header.php");
?>  
	<div id="contenu">
	<center>
		<form method="post" action="sendContact.php">
	<fieldset>
	<legend><p style="text-align:center">Formulaire de Contact</p></legend>
	
	<table>
		<tr>
			<td><label for="nom"><b>*Votre Nom : </b></label></td>
			<td><input id ="nom" autofocus ="autofocus" type="text" name="nom" pattern="^[A-Z].*"
						maxlength="256"	required="required" placeholder="SUPER" title="Nom commençant par maj" size="40"/>	</td>
		</tr>

		<tr>
			<td><label for="mail"><b>*Courriel : </b></label></td>
			<td><input type="email" name="mail" id="mail" required="required" pattern="[^a-zA-Z0-9.--]+@[a-zA-Z]{2,}\.[a-z]{2,3}" 
						required="required" placeholder="didier.super@gmail.com" size="50"/></td>
		</tr>

		<tr>
			<td><label for="tel"><b>Téléphone : </b></label></td>
			<td><input type="tel" name="tel" id="tel" placeholder="0123456789" size="40"/></td>
		</tr>

		<tr>
			<td><label for="area"><b>*Demande : </b></label></td>
			<td>
				<textarea required="required" name="message" id="area" cols="50" rows="5" ></textarea>
			</td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td><input style="margin-top:20px" type="reset" name="effacer" id="effacer" value="Effacer"/></td>
			<td><input style="margin-top:20px"  type="submit" name="submit" id="envoi" value="Envoyer"/></td>
		</tr>
	</table>

	</fieldset>
	</form>
<p style="text-align:center; font-size:10px">Tous les champs marqués d'un astérisque (*) sont obligatoires</p>
	</center>
	
		
  </div>
<?php include("includes/footer.php"); ?>