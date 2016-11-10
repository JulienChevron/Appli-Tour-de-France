<?php

function afficherSponsor($bdd){

        $sql = 'SELECT * FROM TDF_SPONSOR ORDER BY N_SPONSOR DESC';
        $reponse = $bdd->query($sql);
       
        echo'<table class="table table-condensed" id="table"><thead> <tr> <th>Equipe</th> <th>Sponsor</th> <th>Nom</th> <th>Nom abrégé</th> <th>Nationalité</th><th>Année premier tour</th>';
        while ($donnees = $reponse->fetch())
        {   
            $nequipe = $donnees['N_EQUIPE'];
            $nsponsor = $donnees['N_SPONSOR'];
            $nom = $donnees['NOM'];
            $nasponsor = $donnees['NA_SPONSOR'];
            $codetdf = $donnees['CODE_TDF'];
            $anneesponsor = $donnees['ANNEE_SPONSOR'];
            echo '<tr id="ligne"><td>' . $nequipe. '</td><td>' . $nsponsor . '</td><td>' . $nom . '</td><td>' . $nasponsor . '</td><td>' . $codetdf . '</td><td>'. $anneesponsor . '</td><td><a href="supprimerSponsor.php?nequipe=' . $nequipe . '&nsponsor=' . $nsponsor . '&nom=' . $nom . '">Supprimer</a></td></td><td><a href="modifierSponsor.php?nsponsor=' . $nsponsor . '&nom=' . $nom . '&nasponsor=' . $nasponsor . '&codetdf=' . $codetdf . '&anneesponsor=' . $anneesponsor. '&nequipe=' . $nequipe . '">Modifier</a></td></tr>';
        }
        echo '</table>';
        $reponse->closeCursor();
        }
?>