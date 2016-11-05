<?php
    $pwd='../';
    include("includes/header.php");

	if(isset($_GET['nequipe']) && isset($_GET['nsponsor']) && isset($_GET['nom']) && isset($_GET['nasponsor'])  && isset($_GET['codetdf'])  && isset($_GET['anneesponsor'])){
		$nequipe = $_GET['nequipe'];
		$nsponsor = $_GET['nsponsor'];
		$nom = $_GET['nom'];
		$nasponsor = $_GET['nasponsor'];
		$codetdf = $_GET['codetdf'];
		$anneesponsor = $_GET['anneesponsor'];
	}

	if(isset($_POST['Envoyer'])){
        include('modifierSponsorFonc.php'); 
    }
?>
	<div id="contenu" >
	  <form method="post" name="form" id="form" onsubmit="return valider(this);">
	  	<input type="hidden" name="nsponsor" id="nsponsor" value="<?php echo $nsponsor; ?>"/></br>
        <label class="form_col" for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>"/></br>
        <label class="form_col" for="nasponsor">Nom abrégé:</label>
        <input type="text" name="nasponsor" id="nasponsor" value="<?php echo $nasponsor; ?>"/></br>
        <label class="form_col" for="annee_naiss">Année premier tour :</label>
        <input type="number" name="anneesponsor" id="anneesponsor" min="1900" max="2016" value="<?php echo $anneesponsor; ?>"/></br>
        <label class="form_col" for="code_tdf">Nationalité :</label>
            <select name="code_tdf" id="code_tdf">
                <?php 
                    selectCodetdf($conn);
                ?>
            </select>
            </br>
           </br></br>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>

    <script type="text/javascript" src="../js/verifFormulaire.js"></script>

</div>

<?php
    include("includes/footer.php");
?>