<?php

        include('formatage.php');

        if (isset($_POST['nom'])){
            $nom2 = $_POST['nom'];
            $nom2 = formaterNom($nom2);
        }
        if (isset($_POST['nasponsor'])){
            $nasponsor2 = $_POST['nasponsor'];
        }
        if (isset($_POST['code_tdf'])){
            $codetdf2 = $_POST['code_tdf'];
        }
        if (isset($_POST['anneesponsor'])){
            $anneesponsor2 = $_POST['anneesponsor'];
        }
        

        if (isset($_POST['nom']) && isset($_POST['nasponsor']) &&  isset($_POST['code_tdf']) && isset($_POST['anneesponsor'])){
        
            $sql = "UPDATE TDF_SPONSOR SET  NOM = '" . $nom2 . "' , NA_SPONSOR = '" . $nasponsor2 . "' , CODE_TDF = '" . $codetdf2 . "' , ANNEE_SPONSOR = '" . $anneesponsor2 . "'WHERE N_SPONSOR = '" . $nsponsor ."'";

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
            $conn->beginTransaction();
            try {
                $cur = preparerRequete($conn,$sql);
                $res = majDonneesPreparees($cur);
                $conn->commit();
                echo "Sponsor modifié :\n";
            }catch(PDOException $e){
                $conn->rollBack();
                die ($e->getMessage() . "\nErreur lors de l'ajout du sponsor");
                echo "Erreur lors de la modification du sponsor";
            }
        }else{
            echo "Modification du sponsor impossible \n";
        }


?>