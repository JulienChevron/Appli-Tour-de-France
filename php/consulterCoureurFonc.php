<?php

function afficherCoureur($bdd){
        $sql = 'SELECT * FROM TDF_COUREUR ORDER BY N_COUREUR DESC';
        $reponse = $bdd->query($sql);
       
        echo '<table class="table table-condensed" id="table"><thead> <tr> <th>Numero</th> <th>Prenom</th> <th>Nom</th> <th>Code TDF</th> <th>Année de naissance</th><th>Année premier tour</th>';
        while ($donnees = $reponse->fetch())
        {   
            $num = $donnees['N_COUREUR'];
            $codetdf = $donnees['CODE_TDF'];
            $nom = $donnees['NOM'];
            $prenom = $donnees['PRENOM'];
            $naiss = $donnees['ANNEE_NAISSANCE'];
            $anneetdf = $donnees['ANNEE_PREM'];
            echo '<tr id="ligne"><td>' . $num . '</td><td>' . $prenom . '</td><td>' . $nom . '</td><td>' . $codetdf . '</td><td>' . $naiss . '</td><td>'. $anneetdf . '</td></tr>';
        }
        echo '</table>';
        $reponse->closeCursor();
    }

?>