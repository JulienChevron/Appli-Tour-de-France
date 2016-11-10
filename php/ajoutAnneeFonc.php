<?php
    //Test si les valeurs sont enrées
    if(isset($_POST['annee'])){
        $annee = $_POST['annee'];
    }
    if (isset($_POST['repos'])){
        $repos = $_POST['repos'];
    }
    
    //Execution de la requête
    if (isset($_POST['annee']) && isset($_POST['repos'])){
        
        
        $sql = "INSERT INTO TDF_ANNEE (ANNEE, JOUR_REPOS)
                values ('".$annee."', '".$repos."')";
            
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $conn->beginTransaction();
        try {
            $cur = preparerRequete($conn,$sql);
            $res = majDonneesPreparees($cur);
            $conn->commit();
            echo "Année " .$annee. " ajoutée avec " .$repos. " jour(s) de repos";
        }catch(PDOException $e){
            $conn->rollBack();
             if($e->getCode() == 'HY000')
                echo "Année existante, impossible de l'ajouter";
            else
                echo "Ajout de l'année impossible";
        }
    }else{
        //sauvegarde des champs remplis en cas de champs non coformes
        echo "Ajout du courreur impossible : Nom et/ou prénom non conforme(s)\n";
        $saveAnnee = $_POST['annee'];
        $saveRepos = $_POST['repos'];
    }
?>