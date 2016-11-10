<?php
function afficherCoureur($bdd){

    //vérification si un filtre est appliqué
    if(isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["annee_prem"]) && isset($_GET["annee_naiss"]) && isset($_GET["code_tdf"])){
        $sql = requeteFiltre($_GET["nom"],$_GET["prenom"], $_GET["annee_prem"], $_GET["annee_naiss"], $_GET["code_tdf"]);
    }else{
        $sql = 'SELECT * FROM TDF_COUREUR ORDER BY N_COUREUR DESC';
    }

    $reponse = $bdd->query($sql);
   
    echo'<table class="table table-condensed" id="table"><thead> <tr> <th>Numero</th> <th>Prenom</th> <th>Nom</th> <th>Code TDF</th> <th>Année de naissance</th><th>Année premier tour</th>';
    while ($donnees = $reponse->fetch()){   
        $num = $donnees['N_COUREUR'];
        $codetdf = $donnees['CODE_TDF'];
        $nom = $donnees['NOM'];
        $prenom = utf8_encode($donnees['PRENOM']);
        $naiss = $donnees['ANNEE_NAISSANCE'];
        $anneetdf = $donnees['ANNEE_PREM'];
        echo '<tr id="ligne"><td>' . $num . '</td><td>' . $prenom . '</td><td>' . $nom . '</td><td>' . $codetdf . '</td><td>' . $naiss . '</td><td>'. $anneetdf . '</td><td><a href="supprimerCoureur.php?ncoureur=' . $num . '&nom=' . $nom . '&prenom=' . $prenom . '">Supprimer</a></td></td><td><a href="modifierCoureur.php?ncoureur=' . $num . '&nom=' . $nom . '&prenom=' . $prenom . '&naiss=' . $naiss . '&anneetdf=' . $anneetdf . '&codetdf=' . $codetdf . '">Modifier</a></td><td><a href="coureurPlus.php?ncoureur=' . $num . '&nom=' . $nom . '&prenom=' . $prenom . '&naiss=' . $naiss . '&anneetdf=' . $anneetdf . '&codetdf=' . $codetdf . '">Plus</a></td></tr>';
    }
    echo '</table>';
    $reponse->closeCursor();
}

//fonction crééant la requète de seletion des coureurs avec un filtre
function requeteFiltre($nom,$prenom,$prem,$naiss,$tdf){
    $cpt = 0;
    $sql = "SELECT * FROM TDF_COUREUR ";
    if(strcmp($nom, "") != 0){
        $nom = formaterNom($nom);
        $sql = $sql . "WHERE NOM LIKE '%" . $nom ."%' ";
        $cpt++;
    }
    if(strcmp($prenom, "") != 0){
        $prenom = formaterPrenom($prenom);
        if($cpt ==0)
            $sql = $sql . "WHERE PRENOM LIKE '%" . $prenom ."%' ";
        else
            $sql = $sql . "AND PRENOM LIKE '%" . $prenom ."%' ";
        $cpt++;
    }
    if(strcmp($prem, "") != 0){
        if($cpt ==0)
            $sql = $sql . "WHERE ANNEE_PREM = '" . $prem ."' ";
        else
            $sql = $sql . "AND ANNEE_PREM = '" . $prem ."' ";
        $cpt++;
    }
     if(strcmp($naiss, "") != 0){
        if($cpt ==0)
            $sql = $sql . "WHERE ANNEE_NAISS = '" . $naiss ."' ";
        else
            $sql = $sql . "AND ANNEE_NAISS = '" . $naiss ."' ";
        $cpt++;
    }
    if(strcmp($tdf, "") != 0){
        if($cpt ==0)
            $sql = $sql . "WHERE CODE_TDF = '" . $tdf ."' ";
        else
            $sql = $sql . "AND CODE_TDF = '" . $tdf ."' ";
        $cpt++;
    }
    $sql = $sql . "ORDER BY N_COUREUR DESC";
    return $sql;
}

?>