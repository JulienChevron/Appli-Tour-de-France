
  	<?php include('formatage.php');?>
  	  	<?php include('fonction_oracle.php');?>



    <?php
        $nom = "ÆøœŒøñ";
        $prenom = "ÆøœŒøñ";
        $prenom = formaterPrenom($prenom);
        $nom = formaterNom($nom);
        echo $prenom . "  " . $nom;
    ?>