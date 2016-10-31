<?php

function afficherCoureur($bdd){

        if(isset($_GET["recherche"]) && isset($_GET["annee_naiss"]) && isset($_GET["annee_prem"]) && isset($_GET["code_tdf"])){

            $sql = 'SELECT * FROM TDF_COUREUR WHERE ANNEE_PREM = ' . $_GET["annee_prem"] . ' ORDER BY N_COUREUR DESC';
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
                echo '<tr id="ligne"><td>' . $num . '</td><td>' . $prenom . '</td><td>' . $nom . '</td><td>' . $codetdf . '</td><td>' . $naiss . '</td><td>'. $anneetdf . '</td><td><a href="supprimerCoureur.php?ncoureur=' . $num . '&nom=' . $nom . '&prenom=' . $prenom . '">Supprimer</a></td></td><td><a href="modifierCoureur.php?ncoureur=' . $num . '&nom=' . $nom . '&prenom=' . $prenom . '&naiss=' . $naiss . '&anneetdf=' . $anneetdf . '&codetdf=' . $codetdf . '">Modifier</a></td></tr>';
            }
            echo '</table>';
            $reponse->closeCursor();
        }else{

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
            echo '<tr id="ligne"><td>' . $num . '</td><td>' . $prenom . '</td><td>' . $nom . '</td><td>' . $codetdf . '</td><td>' . $naiss . '</td><td>'. $anneetdf . '</td><td><a href="supprimerCoureur.php?ncoureur=' . $num . '&nom=' . $nom . '&prenom=' . $prenom . '">Supprimer</a></td></td><td><a href="modifierCoureur.php?ncoureur=' . $num . '&nom=' . $nom . '&prenom=' . $prenom . '&naiss=' . $naiss . '&anneetdf=' . $anneetdf . '&codetdf=' . $codetdf . '">Modifier</a></td></tr>';
        }
        echo '</table>';
        $reponse->closeCursor();
        }
    }

?>