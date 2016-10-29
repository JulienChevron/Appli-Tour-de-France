<?php
    $pwd='../';
    include("includes/header.php");
?>

 <div id="contenu" >

     <?php
    
        include('fonction_oracle.php');
          
        $session = "ETU2_51";
        $mdp = "ETU2_51";
        $instance = "oci:dbname=info";
        $conn = ConnecterPDO($instance,$session,$mdp);

        function selectCodetdf($bdd){
            echo "PASS : 1";
            $sql = "select code_tdf from tdf_pays";
            $tab = LireDonneesPDO3($bdd,$sql);
            creerListe($tab);
        }

        if(isset($_POST['Envoyer'])){
            include('ajoutCoureurFonc.php');
        }
    ?>


	<form method="post" action=<?=$_SERVER['PHP_SELF']?>>
		<label>PRENOM : </label><input type="text" name="prenom" id="prenom"/></br>
		<label>NOM : </label><input type="text" name="nom" id="nom"/></br>
        <label>ANNEE DE NAISSANCE : </label><input type="number" name="annee_naiss" id="annee_naiss" min="1900" max="1998"/></br>
        <label>ANNEE DU PREMIER TOUR : </label><input type="number" name="annee_prem" id="annee_prem" min="1900" max="2016"/></br>
        <label>PAYS : </label>
            <select name="code_tdf" id="code_tdf">
                <?php selectCodetdf($conn); ?>
            </select></br>
           </br></br>
		<input type="submit" name="Envoyer" id="Envoyer"/>
	</form>

</div>