<?php

        include('formatage.php');

        if(isset($_POST['n_equipe'])){
            $n_equipe = $_POST['n_equipe'];
        }
        if(isset($_POST['nom'])){
            $n_equipe = $_POST['n_equipe'];
        }
        if (isset($_POST['na_sponsor'])){
            $nom = $_POST['nom'];
        }
        if (isset($_POST['annee_sponsor'])){
            $annee_sponsor = $_POST['annee_sponsor'];
        }
        if (isset($_POST['code_tdf'])){
            $code_tdf = $_POST['code_tdf'];
        }
        if (isset($_POST['n_equipe']) && isset($_POST['nom']) && isset($_POST['na_sponsor']) && isset($_POST['annee_sponsor']) && isset($_POST['code_tdf']) && isset($_POST['Envoyer']) && ( strcmp($nom,"?") != 0 ){

            $n_sponsor = "select max(n_sponsor)+1 from TDF_SPONSOR";
        
            $sql = "INSERT INTO TDF_SPONSOR ( N_SPONSOR, N_EQUIPE, NOM, NA_SPONSOR, ANNEE_SPONSOR,  CODE_TDF,  COMPTE_ORACLE, DATE_INSERT)
                values ((".$n_sponsor."), '".$n_equipe."', '".$nom."', '".$na_sponsor."', '".$annee_sponsor."', '".$code_tdf."', USER , sysdate)";


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
            $conn->beginTransaction();
            try {
                $cur = preparerRequete($conn,$sql);
                $res = majDonneesPreparees($cur);
                $conn->commit();
                echo "Sponsor suivant ajouté :\n";
                echo "numéro " .$n_sponsor . ", " . $nom . " né en " . $annee_sponsor . " participant pour la première fois en " . $na_sponsor . "  et de nationnalité : " . $code_tdf; 
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