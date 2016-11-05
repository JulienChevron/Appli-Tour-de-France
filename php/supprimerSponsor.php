<?php

	include('fonction_oracle.php');
	include('includes/connexionBDD.php')
       

	if(isset($_GET['nsponsor']) && isset($_GET['nequipe']) && isset($_GET['nom'])){
		$nsponsor = $_GET['nsponsor'];
		$nequipe = $_GET['nequipe'];
		$nom = $_GET['nom'];
		$sql1 = "SELECT N_SPONSOR, N_EQUIPE FROM TDF_PARTI_EQUIPE WHERE N_SPONSOR = " . $nsponsor ." and N_EQUIPE=" .$nequipe;

        if(1){ //if($reponse->rowCount() == 0){
            $sql = 'DELETE FROM TDF_SPONSOR WHERE N_SPONSOR = ' . $nsponsor . ' and N_EQUIPE = ' .$nequipe;
			$conn->exec($sql);
	        header('Location: consulterSponsor.php?supp=ok');
	        exit();
        }else{
            header('Location: consulterSponsor.php?supp=nope');
            exit();
        }
	}
?>