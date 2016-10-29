
  		<?php include('formatage.php');?>


    <?php
        $nom = "     --   ";
        $prenom = "----'''  ";
        $prenom = formaterPrenom($prenom);
        $nom = formaterNom($nom);
        echo $prenom . "  " . $nom;
    ?>