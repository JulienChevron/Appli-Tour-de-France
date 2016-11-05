<?php

	include('fonction_oracle.php');
    include('includes/connexionBDD.php');

	if(isset($_GET['ncoureur']) && isset($_GET['nom']) && isset($_GET['prenom'])){
		$ncoureur = $_GET['ncoureur'];
		$nom = $_GET['nom'];
		$prenom = $_GET['prenom'];
		$sql1 = "SELECT N_COUREUR FROM TDF_PARTI_COUREUR WHERE N_COUREUR = " . $ncoureur;
		$reponse = $conn->query($sql1);
        $valeur = $reponse->fetchAll();
        if (count($valeur) == 0){
            $sql = 'DELETE FROM TDF_COUREUR WHERE N_COUREUR = ' . $ncoureur;
			$conn->exec($sql);
	        header('Location: consulterCoureur.php?supp=ok');
        }else{
            header('Location: consulterCoureur.php?supp=erreur');
        }
        exit();
       }
?>