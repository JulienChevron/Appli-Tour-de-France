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
        //récupération des données du coureur
      if(isset($_GET['ncoureur']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['codetdf'])  && isset($_GET['naiss'])  && isset($_GET['anneetdf'])){
        $ncoureur = $_GET['ncoureur'];
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $codetdf = $_GET['codetdf'];
        $naiss = $_GET['naiss'];
        $prem = $_GET['anneetdf'];

        echo '<h1>Coureur numéro ' . $ncoureur . " : <strong>" . $prenom . " " . $nom . '  </strong>(' . $codetdf . ')</h1>';

        include('coureurPlusFonc.php');
        afficherInfoCoureur($conn,$prem,$ncoureur);
    }
    ?>
</div>

<?php
    include("includes/footer.php");
?>

</body>
</html>