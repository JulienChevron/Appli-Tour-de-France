<?php

	include('fonction_oracle.php');
          
    $session = "ETU2_51";
    $mdp = "ETU2_51";
    $instance = "oci:dbname=info";
    $conn = ConnecterPDO($instance,$session,$mdp);


	if(isset($_GET['ncoureur']) && isset($_GET['nom']) && isset($_GET['prenom'])){
		$ncoureur = $_GET['ncoureur'];
		$nom = $_GET['nom'];
		$prenom = $_GET['prenom'];
		$sql1 = "SELECT N_COUREUR FROM TDF_PARTI_COUREUR WHERE N_COUREUR = " . $ncoureur;
		$reponse = $conn->query($sql1);
        if($reponse->rowCount() == 0){
            $sql = 'DELETE FROM TDF_COUREUR WHERE N_COUREUR = ' . $ncoureur;
			$conn->exec($sql);
	        header('Location: consulterCoureur.php?supp=ok');
        }else{
            header('Location: consulterCoureur.php?supp=erreur');
        }
        exit();
	}
?>