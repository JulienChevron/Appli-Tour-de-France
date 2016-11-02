<?php

	include('fonction_oracle.php');
          
    $session = "ETU2_51";
    $mdp = "ETU2_51";
    $instance = "oci:dbname=info";
    $conn = ConnecterPDO($instance,$session,$mdp);


	if(isset($_GET['nsponsor']) && isset($_GET['nequipe']) && isset($_GET['nom'])){
		$ncoureur = $_GET['nsponsor'];
		$nom = $_GET['nequipe'];
		$prenom = $_GET['nom'];
		$sql1 = "SELECT N_SPONSOR, N_EQUIPE FROM TDF_PARTI_EQUIPE WHERE N_SPONSOR = " . $nsponsor ." and N_EQUIPE=" .$nequipe;
		//$reponse = $conn->query($sql1);
        if(1){ //if($reponse->rowCount() == 0){
            $sql = 'DELETE FROM TDF_SPONSOR WHERE N_SPONSOR = ' . $ncoureur . ' and N_EQUIPE = ' .$nequipe;
			$conn->exec($sql);
	        header('Location: consulterSponsor.php?supp=ok');
	        exit();
        }else{
            header('Location: consulterSponsor.php?supp=nope');
            exit();
        }
	}
?>