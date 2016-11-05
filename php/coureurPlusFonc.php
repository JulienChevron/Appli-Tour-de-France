<?php

    function afficherPalmares($bdd,$prem,$ncoureur){
        $sql = "SELECT max(ANNEE) AS ANNEE_MAX FROM TDF_ANNEE";
        $reponse = $bdd->query($sql);
        $donnees = $reponse->fetch();
        $anneeMax = $donnees['ANNEE_MAX'];
        $reponse->closeCursor();
        echo '<table class="table table-condensed" id="table"><thead> <tr> <th>ANNEE</th> <th>CLASSEMENT</th> <th>TEMPS TOTAL</th></thead>';
        for($i = $anneeMax; $i>=$prem;$i--){ //$i = $prem; $i<=$anneeMax;$i++
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
                        $tps = $donnees['TEMPS_TOTAL']/60;
                        echo '<tr id="ligne"><td>' . $annee . '</td><td>' . $class . '</td><td>' . $tps . '</td></tr>';
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




