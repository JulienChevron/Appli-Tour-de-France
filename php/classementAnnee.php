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

     <?php
    
        include('fonction_oracle.php');
          
        $session = "ETU2_51";
        $mdp = "ETU2_51";
        $instance = "oci:dbname=info;charset=latin1";
        $conn = ConnecterPDO($instance,$session,$mdp);
    ?>



    <form method="get" name="form" id="form" action="<?=$_SERVER['PHP_SELF']?>">
        <label class="form_col" for="annee">Année :</label>
            <select name="annee" id="annee">
                <?php 
                    selectAnneeCoureur($conn);
                ?>
            </select>
            </br></br></br>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>


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



</div>

<?php
    include("includes/footer.php");
?>

</body>
</html>