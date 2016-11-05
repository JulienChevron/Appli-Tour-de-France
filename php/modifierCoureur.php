<?php
    $pwd='../';
    include("includes/header.php");
	include('fonction_oracle.php');
          
    $session = "ETU2_51";
    $mdp = "ETU2_51";
    $instance = "oci:dbname=info";
    $conn = ConnecterPDO($instance,$session,$mdp);
    
	if(isset($_GET['ncoureur']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['codetdf'])  && isset($_GET['naiss'])  && isset($_GET['anneetdf'])){
		$ncoureur = $_GET['ncoureur'];
		$nom = $_GET['nom'];
		$prenom = $_GET['prenom'];
		$codetdf = $_GET['codetdf'];
		$naiss = $_GET['naiss'];
		$anneetdf = $_GET['anneetdf'];
	}

	if(isset($_POST['Envoyer'])){
        include('modifierCoureurFonc.php');
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <title>Titre</title>
    </head>

<body>

	<div id="contenu" >
	  <form method="post" name="form" id="form" onsubmit="return valider(this);">
	  	<input type="hidden" name="ncoureur" id="ncoureur" value="<?php echo $ncoureur; ?>"/></br>
        <label class="form_col" for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>"/></br>
        <label class="form_col" for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>"/></br>
        <label class="form_col" for="annee_naiss">Année de naissance :</label>
        <input type="number" name="annee_naiss" id="annee_naiss" min="1900" max="1998" value="<?php echo $naiss; ?>"/></br>
        <label class="form_col" for="annee_prem">Année de premier tour :</label>
        <input type="number" name="annee_prem" id="annee_prem" min="1900" max="2016" value="<?php echo $anneetdf; ?>"/></br>
        <label class="form_col" for="code_tdf">Code tdf :</label>
            <select name="code_tdf" id="code_tdf">
                <?php 
                    selectCodetdf($conn);
                ?>
            </select>
            <!--<span class="tooltip">Veillez remplir un code TDF</span>-->
            </br>
           </br></br>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>

    <script type="text/javascript" src="../js/verifFormulaire.js"></script>

</div>

<?php
    include("includes/footer.php");
?>

</body>
</html>