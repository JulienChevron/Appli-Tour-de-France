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

        echo '<h1>Année ' . $annee . ' : </h1>';
    ?>
     <fieldset><legend>Selectionnez une étape</legend>
    <form method="get" name="form" id="form" action="<?=$_SERVER['PHP_SELF']?>">
        <label class="form_col" for="epreuve">Année :</label>
            <input type="hidden" name="annee" id="annee" value="<?php echo $annee;?>"/>
            <select name="epreuve" id="epreuve">
                <?php
                    selectEpreuve($conn,$annee);
                ?>
            </select>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>
    </fieldset>

    <?php
        }

        if(isset($_GET['epreuve'])){
            $epreuve = $_GET['epreuve'];
            $sql = "SELECT N_COUREUR, NOM, PRENOM, ANNEE, N_EPREUVE, HEURE, MINUTE, SECONDE, RANG_ARRIVEE FROM TDF_TEMPS JOIN TDF_COUREUR USING (N_COUREUR) WHERE ANNEE = " . $annee . " AND N_EPREUVE = " . $epreuve . " ORDER BY RANG_ARRIVEE";
                echo '<h2>Classement de l\'étape numéro '.$epreuve.' du tour '.$annee;
                echo '<table class="table table-condensed" id="table"><thead> <tr> <th>NUM</th><th>NOM</th><th>PRENOM</th> <th>CLASSEMENT</th> <th>TEMPS TOTAL</th></thead>';
                try{    
                    $reponse = $conn->query($sql);
                    while ($donnees = $reponse->fetch())
                    {   
                        $num = $donnees['N_COUREUR'];
                        $nom = $donnees['NOM'];
                        $prenom = utf8_encode($donnees['PRENOM']);
                        $class = $donnees['RANG_ARRIVEE'];
                        $heures = $donnees['HEURE'];
                        $minutes = $donnees['MINUTE'];
                        $secondes = $donnees['SECONDE'];
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