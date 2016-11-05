<?php


    include('fonction_oracle.php');
          
    $session = "ETU2_51";
    $mdp = "ETU2_51";
    $instance = "oci:dbname=info";
    $bdd = ConnecterPDO($instance,$session,$mdp);


        for($i = 2016; $i>=1990;$i--){ //$i = $prem; $i<=$anneeMax;$i++

        echo '<table class="table table-condensed" id="table"><thead> <tr> <th>NUM</th><th>NOM</th><th>PRENOM</th> <th>CLASSEMENT</th> <th>TEMPS TOTAL</th></thead>';
            try{
 
                    echo $i;
                    $sql = "SELECT * FROM TDF_CLASSEMENT_" . $i . " WHERE N_COUREUR = 477";
                    $reponse = $bdd->query($sql);
                    while ($donnees = $reponse->fetch())
                    {   
                        $num = $donnees['N_COUREUR'];
                        $nom = $donnees['NOM'];
                        $prenom = $donnees['PRENOM'];
                        $class = $donnees['CLASSEMENT'];
                        $tps = $donnees['TEMPS_TOTAL']/60;
                        echo '<tr id="ligne"><td>' . $num . '</td><td>' . $nom . '</td><td>' . $prenom . '</td><td>' . $class . '</td><td>' . $tps . '</td></tr>';
                    }
                    $reponse->closeCursor();
            }catch(PDOException $e){

            }
            echo '</table>';
    }
               

    ?>