<?php

    include('formatage.php');

    if(isset($_POST['annee'])){
        $annee = $_POST['annee'];
    }
    if (isset($_POST['codeD'])){
        $codeD = $_POST['codeD'];
    }
     if (isset($_POST['codeA'])){
        $codeA = $_POST['codeA'];
    }
    if (isset($_POST['num'])){
        $num = $_POST['num'];
    }
    if (isset($_POST['villeD'])){
        $villeD = formaterNom($_POST['villeD']);
    }
     if (isset($_POST['villeA'])){
        $villeA = formaterNom($_POST['villeA']);
    }
     if (isset($_POST['distance'])){
        $distance = formaterNom($_POST['distance']);
    }
    if (isset($_POST['jour'])){
        $jour = formaterNom($_POST['jour']);
    }
    if (isset($_POST['cat'])){
        $cat = formaterNom($_POST['cat']);
    }

    if (isset($_POST['annee']) && isset($_POST['codeD']) && isset($_POST['codeA']) && isset($_POST['codeD']) && isset($_POST['num']) && isset($_POST['villeD']) && isset($_POST['villeA']) && isset($_POST['distance']) && isset($_POST['jour']) && isset($_POST['cat']) && ( strcmp($villeD,"?") != 0 && strcmp($villeA,"?") != 0)){
        
        $sql2 = "DELETE FROM TDF_EPREUVE WHERE ANNEE = '2017' AND N_EPREUVE = '1'";
        
        $sql = "INSERT INTO TDF_EPREUVE (ANNEE, N_EPREUVE, CODE_TDF_D, CODE_TDF_A, VILLE_D, VILLE_A, DISTANCE, JOUR, CAT_CODE)
                values ('".$annee."', '".$num."', '".$codeD."', '".$codeA."', '".$villeD."', '".$villeA."', '".$distance."', '".$jour."', '".$cat."')";
            
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $conn->beginTransaction();
        try {
        	$cur = preparerRequete($conn,$sql2);
            $res = majDonneesPreparees($cur);
            $cur = preparerRequete($conn,$sql);
            $res = majDonneesPreparees($cur);
            $conn->commit();
            //echo "Pays " .$pays. " ajouté avec comme code : " .$code. " et comme initiale : " . $init;
        }catch(PDOException $e){
            $conn->rollBack();
             if($e->getCode() == 'HY000')
                echo "Epreuve existante, impossible de l'ajouter";
            else
                echo "Ajout impossible";
        }
    }else{
        echo "Ajout epreuve impossible, les champs sont incorrects\n";
    }


?>