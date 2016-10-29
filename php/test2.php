<?php 
    $pwd='../';
    include("includes/header.php");
    include('connexionBDD.php');
    /*include('formatage.php');*/
	

?>
            <div id="contenu" >
            	

            	<?php
        function selectCodetdf($bdd){
            $sql = "select code_tdf from tdf_pays";
            $reponse = $bdd->query($sql);
            while($donnees = $reponse->fetch())
                echo '<option value="' . $donnees[0] . '">' .  $donnees[0] .'</option>';
            $reponse->closeCursor();
        }

        function afficher2($str){
            echo '<pre>';
            echo '<HR>';
                print_r($str);
            echo '</pre>';
        }
    ?>

	<form method="post" action=<?=$_SERVER['PHP_SELF']?>>
		<label>PRENOM : </label><input type="text" name="prenom" id="prenom" placeholder="Didier"/></br>
		<label>NOM : </label><input type="text" name="nom" id="nom" placeholder="SUPER"/></br>
        <label>ANNEE DE NAISSANCE : </label><input type="number" name="annee_naiss" id="annee_naiss" min="1900" max="1998" placeholder="1930"/></br>
        <label>ANNEE DU PREMIER TOUR : </label><input type="number" name="annee_prem" id="annee_prem" min="1900" max="2016" placeholder="Le coureur doit avoir 18 ans"/></br>
        <label>PAYS : </label>
            <select name="code_tdf" id="code_tdf"><?php selectCodetdf($conn); ?></select></br>


    <?php 
    //POST NOM ET PRENOM + FORMATAGE
        if(isset($_POST['prenom']) && isset($_POST['nom'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            //$nom = formaterNom($nom);
           // $prenom = formaterPrenom($prenom);
        }

    //POST ANNEE_NAISS ET ANNEE_PREM + VERIF (age>18)
        if (isset($_POST['annee_naiss']) && $_POST['annee_prem']){
            $annee_prem = $_POST['annee_prem'];
            $annee_naiss = $_POST['annee_naiss'];
            //verificationAge($annee_prem, $annee_naiss);
        }

    //POST DES AUTRES ELEMENTS 
        if (isset($_POST['code_tdf'])){
            $code_tdf = $_POST['code_tdf'];
        }

        $n_coureur = "select max(n_coureur)+1 from TDF_COUREUR";

    //GENERATION REQUETE AJOUT COUREUR DANS LA BDD
    if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['annee_naiss']) && isset($_POST['annee_prem']) && isset($_POST['code_tdf']) && isset($_POST['Envoyer'])){

        $n_coureur = "select max(n_coureur)+1 from TDF_COUREUR";

        echo "INSERT INTO TDF_COUREUR (N_COUREUR, NOM, PRENOM, ANNEE_NAISSANCE, CODE_TDF, ANNEE_PREM, COMPTE_ORACLE, DATE_INSERT)
                values ((".$n_coureur."), '".$nom."', '".$prenom."', '".$annee_naiss."', '".$code_tdf."', '".$annee_prem."', USER , sysdate);";

        
        $sql = "INSERT INTO TDF_COUREUR (N_COUREUR, NOM, PRENOM, ANNEE_NAISSANCE, CODE_TDF, ANNEE_PREM, COMPTE_ORACLE, DATE_INSERT)
                values ((".$n_coureur."), '".$nom."', '".$prenom."', '".$annee_naiss."', '".$code_tdf."', '".$annee_prem."', USER , sysdate)";


       // afficher2("0A".$conn);
        afficher2($sql);
        $req = preparerRequete($conn,$sql);
        afficher2($req);
        $res = majDonneesPreparees($req);
        afficher2($res);
/*
        $sql1 = "commit";
        $req1 = preparerRequete($conn,$sql1);
        $res1 = majDonneesPreparees($req1);

        afficher2($sql);
*/
    }

     
    ?> 
        </br></br>
		<input type="submit" name="Envoyer" id="Envoyer"/>
	</form>

			 </div>
			
	 <?php
	include("includes/footer.php"); ?>
    ?>