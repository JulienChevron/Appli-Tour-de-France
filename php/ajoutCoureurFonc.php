<?php

    include('formatage.php');

    if(isset($_POST['prenom']) && isset($_POST['nom'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $nom = formaterNom($nom);
        $prenom = formaterPrenom($prenom);
    }
    if(isset($_POST['annee_prem'])){
        $annee_prem = $_POST['annee_prem'];
    }else {
        $annee_prem = '';
    }
    if(isset($_POST['annee_naiss'])){
        $annee_naiss = $_POST['annee_naiss'];
    }else {
        $annee_naiss = '';
    }
    if (isset($_POST['code_tdf'])){
        $code_tdf = $_POST['code_tdf'];
    }
    if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['code_tdf']) && isset($_POST['Envoyer']) && ( strcmp($nom,"?") != 0 && strcmp($prenom,"?") != 0)){
        $n_coureur = "select max(n_coureur)+1 from TDF_COUREUR";
        $nom = ApostropheInsert($nom);
        $prenom = ApostropheInsert($prenom);
        
        $sql = "INSERT INTO TDF_COUREUR (N_COUREUR, NOM, PRENOM, ANNEE_NAISSANCE, CODE_TDF, ANNEE_PREM, COMPTE_ORACLE, DATE_INSERT)
                values ((".$n_coureur."), '".$nom."', '".$prenom."', '".$annee_naiss."', '".$code_tdf."', '".$annee_prem."', USER , sysdate)";
            

        Afficher($sql);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $conn->beginTransaction();
        try {
            $cur = preparerRequete($conn,$sql);
            $res = majDonneesPreparees($cur);
            $conn->commit();
            echo "Courreur suivant ajouté :\n";
            echo utf8_encode($prenom) . " " . utf8_encode($nom) . " né en " . $annee_naiss . " participant pour la première fois en " . $annee_prem . "  et de nationnalité : " . $code_tdf; 
        }catch(PDOException $e){
            $conn->rollBack();
            //die ($e->getMessage() . "\nErreur lors de l'ajout du courreur");
            echo "Erreur lors de l'ajout du courreur";
        }
    }else{
        echo "Ajout du courreur impossible : Nom et/ou prénom non conforme(s)\n";
        $saveNom = $_POST['nom'];
        $savePrenom = $_POST['prenom'];
        $saveAnnee_prem = $_POST['annee_prem'];
        $saveAnnee_naiss = $_POST['annee_naiss'];
    }
?>