<?php

        include('formatage.php');

        if(isset($_POST['n_equipe'])){
            $n_equipe = $_POST['n_equipe'];
        }
        if(isset($_POST['annee_creation'])){
            $annee_creation = $_POST['annee_creation'];
        }
        if (isset($_POST['annee_disparition'])){
            $annee_disparition = $_POST['annee_disparition'];
        }
        
        if (isset($_POST['n_equipe']) && isset($_POST['annee_creation'])){

            $n_sponsor = "select max(n_sponsor)+1 from TDF_SPONSOR";
        
            $sql = "INSERT INTO TDF_EQUIPE ( N_EQUIPE, ANNEE_CREATION, ANNEE_DISPARITION, COMPTE_ORACLE, DATE_INSERT)
                values ('".$n_equipe."', '".$annee_creation."', '".$annee_disparition."' ,  USER , sysdate)";


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
            $conn->beginTransaction();
            try {
                $cur = preparerRequete($conn,$sql);
                $res = majDonneesPreparees($cur);
                $conn->commit();
                echo "Sponsor suivant ajouté :\n";
                /*echo "numéro " .$n_sponsor . ", " . $nom . " né en " . $annee_sponsor . " participant pour la première fois en " . $na_sponsor . "  et de nationnalité : " . $code_tdf; */
            }catch(PDOException $e){
                $conn->rollBack();
                //die ($e->getMessage() . "\nErreur lors de l'ajout du courreur");
                echo "Erreur lors de l'ajout du sponsor";
            }
        }else{
            echo "Ajout du sponsor impossible : Nom et/ou prénom non conforme(s)\n";
            $saveNomSponsor = $_POST['nom'];
            $saveNaSponsor = $_POST['na_sponsor'];
            $saveAnneeSponsor = $_POST['annee_sponsor'];
        }


?>