<?php 
    $pwd='../';
    include("includes/header.php");
	include("includes/assets.php");
	
	/*$db=connexionBDD();	
	$id = (isset($_POST['id']) AND !empty($_POST['id']))?$_POST['id']:null;
	$mdp = (isset($_POST['mdp']) AND !empty($_POST['mdp']))?$_POST['mdp']:null;*/

?>
            <div id="contenu" >
			<center>
			<fieldset>
		<legend><p style="text-align:center">Se connecter</p></legend>
			<?php
			
				if(isset($_SESSION['type']) && ($_SESSION['type'] == 'admin' OR $_SESSION['type'] == 'club')){
					echo'<h2 style="text-align:center;">Vous etes deja connecté en temps que <strong>'.$_SESSION['type'].' </strong></h2>';
							echo'<script type="text/javascript">
			window.setTimeout("location=(\'accueil.php\');",2500);
		</script>';
				}
				else{
					if($id != null AND $mdp != null){
						if($id == 'admin' AND $mdp == 'admin'){
							$_SESSION['type'] = 'admin';
							echo'<h2 style="text-align:center;"><strong>Connexion Reussis !</strong></h2>';

							echo'<script type="text/javascript">
			window.setTimeout("location=(\'accueil.php\');",2500);
		</script>';
						}
						else{
						
							$reponse="SELECT * from club where CLUB_id =".$id;
							$result = $db->query($reponse);
							$ligne = $result->fetch();
							if(sizeof($ligne) >=1){
								if($ligne['CLUB_ID'] == $id && $ligne['CLUB_MDP'] == $mdp){
									if($ligne['CLUB_VALIDE'] == 1){
										echo'<h2 style="text-align:center;"><strong>Connexion Reussis !</strong></h2>';
										$_SESSION['type'] = 'club';
										$_SESSION['nom'] = $ligne['CLUB_NOM'];
										echo'<script type="text/javascript">
			window.setTimeout("location=(\'accueil.php\');",2500);
		</script>';
									}
									else{
										echo'<h2 style="text-align:center;"><strong>Votre compte n\'a pas été validé par l\'administrateur</strong></h2>';
										echo'<script type="text/javascript">
			window.setTimeout("location=(\'accueil.php\');",2500);
		</script>';
									}
								}
								else{
									echo'<h2 style="text-align:center;"><strong>Identification Identifiant/Mot de Passe invalide</strong></h2>';
												echo'<script type="text/javascript">
			window.setTimeout("location=(\'accueil.php\');",2500);
		</script>';
								}
							}
							else{
								 echo'<h2 style="text-align:center;"><strong>Identifiant/Mot de Passe Incorrect</strong></h2>';
								 					echo'<script type="text/javascript">
			window.setTimeout("location=(\'accueil.php\');",2500);
		</script>';
							}
						}
					}
					else{
			?>
			<table>
            	<form method="post" action="">

					<tr><td><label for="id">Identifiant:</label></td>
					<td><input id ="id" autofocus ="autofocus" type="text" name="id" 
	maxlength="256"	required="required" placeholder="Identifiant" title="Entrez votre identifiant"
	size="40"/></td></tr>
					<tr><td><label for="mdp">Mot de Passe:</label></td>
					<td><input id ="mdp" autofocus ="autofocus" type="password" name="mdp" 
	maxlength="256"	required="required" placeholder="Mot de passe" title="Entrez votre mot de passe"
	size="40"/></td></tr>
					<tr><td><input colspan="2" style="text-align:center" type="submit" name="submit" id="submit" value="Envoyer"/></td></tr>

				</form>
				</table>
				</fieldset>
			 </center>
		
			
	 <?php
					}
				}
				echo "</div>";
	include("includes/footer.php"); ?>