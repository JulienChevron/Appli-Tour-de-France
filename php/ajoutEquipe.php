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

        if(isset($_POST['Envoyer'])){
            include('ajoutEquipeFonc.php');
        }
    ?>

    <form method="post" name="form" id="form" onsubmit="return valider(this);">
        <label class="form_col" for="n_equipe">N_EQUIPE :</label>
        <input type="number" name="n_equipe" id="n_equipe" value="<?php if(isset($saveNEquipe)) echo $saveNEquipe; ?>"/></br>
        <label class="form_col" for="annee_creation">Année de création:</label>
        <input type="number" name="annee_creation" id="annee_creation" min="1900" value="<?php if(isset($saveAnnee_creation)) echo $saveAnnee_creation; ?>"/></br>
        <label class="form_col" for="annee_disparition">Année de disparition :</label>
        <input type="number" name="annee_disparition" id="annee_disparition" min="1900" value="<?php if(isset($saveAnnee_disparition)) echo $saveAnnee_disparition; ?>"/></br>
        
            <!--<span class="tooltip">Veillez remplir un code TDF</span>-->
            </br>
           </br></br>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>

    <script type="text/javascript" src="../js/verifFormulaire.js"></script>

</div>

<?php
    include("includes/footer.php");
?>