<?php

    include('formatage.php');

    if(isset($_POST['pays'])){
        $pays = formaterNom($_POST['pays']);
    }
    if (isset($_POST['codetdf'])){
        $code = formaterNom($_POST['codetdf']);
    }
     if (isset($_POST['paysInit'])){
        $init = formaterNom($_POST['paysInit']);
    }
    if (isset($_POST['pays']) && isset($_POST['codetdf']) && isset($_POST['paysInit']) && ( strcmp($pays,"?") != 0 && strcmp($code,"?") != 0) && strcmp($init,"?") != 0){
        
        
        $sql = "INSERT INTO TDF_PAYS (CODE_TDF, NOM, C_PAYS)
                values ('".$code."', '".$pays."', '".$init."')";
            
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $conn->beginTransaction();
        try {
            $cur = preparerRequete($conn,$sql);
            $res = majDonneesPreparees($cur);
            $conn->commit();
            echo "Pays " .$pays. " ajouté avec comme code : " .$code. " et comme initiale : " . $init;
        }catch(PDOException $e){
            $conn->rollBack();
             if($e->getCode() == 'HY000')
                echo "Pays existant, impossible de l'ajouter";
            else
                echo "Ajout du pays impossible";
        }
    }else{
        echo "Ajout du pays impossible, les champs sont incorrects\n";
        $savePays = $_POST['pays'];
        $saveCode = $_POST['codetdf'];
        $savePaysInit = $_POST['paysInit'];
    }
?>