<?php
    $pwd='../';
    include("includes/header.php");
?>

 <div id="contenu" >

     <?php
    
        include('fonction_oracle.php');
          
        $session = "ETU2_51";
        $mdp = "ETU2_51";
        $instance = "oci:dbname=info";
        $conn = ConnecterPDO($instance,$session,$mdp);
    ?>

    <?php
        include('consulterCoureurFonc.php');
        afficherCoureur($conn);

    ?>


</div>

<?php
    include("includes/footer.php");
?>