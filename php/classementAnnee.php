<?php
    $pwd='../';
    include("includes/header.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <title>Titre</title>
    </head>

<body>
 <div id="contenu" >
 <fieldset><legend>Selectionnez une année</legend>
    <form method="get" name="form" id="form" action="<?=$_SERVER['PHP_SELF']?>">
        <label class="form_col" for="annee">Année :</label>
            <select name="annee" id="annee">
                <?php 
                	if(isset($_GET['annee'])) //sauvegarde de l'année dans la liste
                        echo '<option value="'.$_GET['annee'].'">'.$_GET['annee'].'</option>';
                    selectAnneeCoureur($conn);
                ?>
            </select>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>
    </fieldset>


    <?php
    if(isset($_GET['annee'])){
        $annee = $_GET['annee'];

        echo '<h1>Classement général de l\'année ' . $annee . ' : </h1>';

      echo '<table class="table table-condensed" id="table"><thead> <tr> <th>NUM</th><th>NOM</th><th>PRENOM</th> <th>CLASSEMENT</th> <th>TEMPS TOTAL</th></thead>';
            try{
                    $sql = "SELECT * FROM TDF_CLASSEMENT_" . $annee;
                    $reponse = $conn->query($sql);
                    while ($donnees = $reponse->fetch())
                    {   
                        $num = $donnees['N_COUREUR'];
                        $nom = $donnees['NOM'];
                        $prenom = utf8_encode($donnees['PRENOM']);
                        $class = $donnees['CLASSEMENT'];
                        //transformation du temps en format Heures/Minutes/Secondes
                        $time = (($donnees['TEMPS_TOTAL']/60)/60);
                        $nb = explode('.', $time);
                        $heures = $nb[0];
                        $time = (($time-$heures) * 60);
                        $nb = explode('.', $time);
                        $minutes = $nb[0];
                        $time = $time = (($time-$minutes) * 60);
                        $secondes = round($time, 0, PHP_ROUND_HALF_EVEN);
                        echo '<tr id="ligne"><td>' . $num . '</td><td>' . $nom . '</td><td>' . $prenom . '</td><td>' . $class . '</td><td>' . $heures . 'h' . $minutes . 'm' . $secondes . 's</td></tr>';
                    }
                    $reponse->closeCursor();
            }catch(PDOException $e){

            }
            echo '</table>';
    }

    ?>



</div>

<?php
    include("includes/footer.php");
?>

</body>
</html>