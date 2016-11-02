<?php

        include('formatage.php');

        if(isset($_POST['annee'])){
            $annee = $_POST['annee'];
        }
        if (isset($_POST['n_sponsor'])){
            $n_sponsor = $_POST['n_sponsor'];
        }
        if (isset($_POST['n_pre_directeur'])){
            $n_pre_directeur = $_POST['n_pre_directeur'];
        }
        if (isset($_POST['n_co_directeur'])){
            $n_co_directeur = $_POST['n_co_directeur'];
        }
        
        if (isset($_POST['annee']) && isset($_POST['n_sponsor']) && isset($_POST['n_pre_directeur']) && isset($_POST['n_co_directeur'])){

            $n_equipe = "(select max(n_equipe)+1 from TDF_PARTI_EQUIPE)";
        
            $sql = "INSERT INTO TDF_PARTI_EQUIPE ( 
            ANNEE, N_EQUIPE, N_SPONSOR, N_PRE_DIRECTEUR,  N_CO_DIRECTEUR, COMPTE_ORACLE, DATE_INSERT)
                values (".$annee.", ".$n_equipe." ,".$n_sponsor.", ".$n_pre_directeur." , ".$n_co_directeur." , USER , sysdate)";


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
            $conn->beginTransaction();
            try {
                $cur = preparerRequete($conn,$sql);
                $res = majDonneesPreparees($cur);
                $conn->commit();
                echo "Equipe suivante ajoutée :\n";
                echo "numéro " .$n_equipe . ", de sponsor numéro" . $n_sponsor . ", avec les directeurs " . $n_pre_directeur . " et ".$n_co_directeur. ", participant pour la première fois en " . $annee; 
            }catch(PDOException $e){
                $conn->rollBack();
                die ($e->getMessage() . "\nErreur lors de l'ajout de l'équipe");
                echo "Erreur lors de l'ajout de l'équipe";
            }
        }else{
            echo "Ajout de l'équipe impossible :\n";
            $saveAnneeEquipe = $_POST['annee'];
            $saveNSponsor = $_POST['n_sponsor'];
            $saveNPreDirecteur = $_POST['n_pre_directeur'];
            $saveNCoDirecteur = $_POST['n_co_directeur'];
        }


?>