<?php

    function afficherInfoCoureur($bdd,$prem,$ncoureur){
        $sqlV = "SELECT N_COUREUR, ANNEE FROM TDF_PARTI_COUREUR WHERE N_COUREUR = " . $ncoureur;
        $reponse = $bdd->query($sqlV);
        $valeur = $reponse->fetchAll();
        if (count($valeur) != 0){   
            echo '<h2>Palmares</h2>';
            afficherPalmares($bdd,$prem,$ncoureur);
            echo '<h2>Abandons</h2>';
            afficherAbandons($bdd,$prem,$ncoureur);
            echo '<h2>Liste des équipes</h2>';
            afficherEquipes($bdd,$ncoureur);
        }else{
            echo '<h4>AUCUNE PARTICIPATION POUR CE COURREUR</h4>';
        }
    }

    function afficherPalmares($bdd,$prem,$ncoureur){
        $sql = "SELECT max(ANNEE) AS ANNEE_MAX FROM TDF_ANNEE";
        $reponse = $bdd->query($sql);
        $donnees = $reponse->fetch();
        $anneeMax = $donnees['ANNEE_MAX'];
        $reponse->closeCursor();
        echo '<table class="table table-condensed" id="table"><thead> <tr> <th>ANNEE</th> <th>CLASSEMENT</th> <th>TEMPS TOTAL</th></thead>';
        for($i = $anneeMax; $i>=$prem;$i--){
            try{
                $sqlV = "SELECT N_COUREUR, ANNEE FROM TDF_PARTI_COUREUR WHERE N_COUREUR = " . $ncoureur . " AND ANNEE = " .$i;
                $reponse = $bdd->query($sqlV);
                $valeur = $reponse->fetchAll();
                if (count($valeur) != 0){
                    $sql = "SELECT * FROM TDF_CLASSEMENT_" . $i . " WHERE N_COUREUR = " . $ncoureur;
                    $reponse = $bdd->query($sql);
                    while ($donnees = $reponse->fetch())
                    {  
                        $annee = $donnees['ANNEE'];
                        $class = $donnees['CLASSEMENT'];
                        $time = (($donnees['TEMPS_TOTAL']/60)/60);
                        $nb = explode('.', $time);
                        $heures = $nb[0];
                        $time = (($time-$heures) * 60);
                        $nb = explode('.', $time);
                        $minutes = $nb[0];
                        $time = $time = (($time-$minutes) * 60);
                        $secondes = round($time, 0, PHP_ROUND_HALF_EVEN);
                        echo '<tr id="ligne"><td>' . $annee . '</td><td>' . $class . '</td><td>' . $heures . 'h' . $minutes . 'm' . $secondes . 's</td></tr>';
                    }
                    $reponse->closeCursor();
               }
            }catch(PDOException $e){

            }
        }
        echo '</table>';
    }

    function afficherAbandons($bdd,$prem,$ncoureur){
        $sql = "SELECT max(ANNEE) AS ANNEE_MAX FROM TDF_ANNEE";
        $reponse = $bdd->query($sql);
        $donnees = $reponse->fetch();
        $anneeMax = $donnees['ANNEE_MAX'];
        $reponse->closeCursor();
        echo '<table class="table table-condensed" id="table"><thead> <tr> <th>ANNEE</th> <th>EPREUVE</th> <th>MOTIF</th></thead>';
        for($i = $anneeMax; $i>=$prem;$i--){
            try{
                $sqlV = "SELECT N_COUREUR, ANNEE FROM TDF_ABANDON WHERE N_COUREUR = " . $ncoureur . " AND ANNEE = " .$i;
                $reponse = $bdd->query($sqlV);
                $valeur = $reponse->fetchAll();
                if (count($valeur) != 0){
                    $sql = "SELECT ANNEE, N_COUREUR, N_EPREUVE, C_TYPEABAN, LIBELLE FROM TDF_ABANDON JOIN TDF_TYPEABAN USING (C_TYPEABAN) WHERE N_COUREUR = " . $ncoureur . " AND ANNEE = " .$i;
                    $reponse = $bdd->query($sql);
                    while ($donnees = $reponse->fetch())
                    {  
                        $annee = $donnees['ANNEE'];
                        $epreuve = $donnees['N_EPREUVE'];
                        $libelle = $donnees['LIBELLE'];
                        echo '<tr id="ligne"><td>' . $annee . '</td><td>' . $epreuve . '</td><td>' . $libelle . '</td></tr>';
                    }
                    $reponse->closeCursor();
               }
            }catch(PDOException $e){

            }
        }
        echo '</table>';
    }

    function afficherEquipes($bdd,$ncoureur){
        echo '<table class="table table-condensed" id="table"><thead> <tr> <th>ANNEE</th> <th>EQUIPE</th></thead>';
        try{
                $sqlV = "SELECT N_COUREUR FROM TDF_PARTI_COUREUR WHERE N_COUREUR = " . $ncoureur;
                $reponse = $bdd->query($sqlV);
                $valeur = $reponse->fetchAll();
                if (count($valeur) != 0){
                    $sql = "SELECT ANNEE, N_COUREUR, N_SPONSOR, NOM FROM TDF_PARTI_COUREUR JOIN TDF_SPONSOR USING (N_SPONSOR,N_EQUIPE) WHERE N_COUREUR = " .$ncoureur . " ORDER BY ANNEE DESC";
                    $reponse = $bdd->query($sql);
                    while ($donnees = $reponse->fetch())
                    {   
                        $annee = $donnees['ANNEE'];
                        $equipe = $donnees['NOM'];
                        echo '<tr id="ligne"><td>' . $annee . '</td><td>' . $equipe . '</td></tr>';
                    }
                    $reponse->closeCursor();
               }
            }catch(PDOException $e){

            }
        echo '</table>';
    }
?>