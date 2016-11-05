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

    <?php


      if(isset($_GET['ncoureur']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['codetdf'])  && isset($_GET['naiss'])  && isset($_GET['anneetdf'])){
        $ncoureur = $_GET['ncoureur'];
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $codetdf = $_GET['codetdf'];
        $naiss = $_GET['naiss'];
        $prem = $_GET['anneetdf'];

        echo '<h1>Coureur numéro ' . $ncoureur . " : <strong>" . $prenom . " " . $nom . '  </strong>(' . $codetdf . ')</h1>';

        include('coureurPlusFonc.php');
        echo '<h2>Palmares</h2>';
        afficherPalmares($conn,$prem,$ncoureur);
        echo '<h2>Liste des équipes</h2>';
        afficherEquipes($conn,$ncoureur);

    }
    ?>



</div>

<?php
    include("includes/footer.php");
?>

</body>
</html>