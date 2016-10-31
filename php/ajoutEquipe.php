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
        <label class="form_col" for="annee">ANNEE :</label>
        <input type="number" name="annee" id="annee" min="1900" value="<?php if(isset($saveAnnee)) echo $saveAnnee; ?>"/></br>
        <label class="form_col" for="n_sponsor">N_SPONSOR :</label>
        <input type="number" name="n_sponsor" id="n_sponsor" value="<?php if(isset($saveNSponsor)) echo $saveNSponsor; ?>"/></br>
        <label class="form_col" for="annee_disparition">N_PRE_DIRECTEUR :</label>
        <input type="number" name="n_pre_directeur" id="n_pre_directeur" value="<?php if(isset($saveNPreDirecteur)) echo $saveNPreDirecteur; ?>"/></br>
        <label class="form_col" for="n_co_directeur">N_CO_DIRECTEUR :</label>
        <input type="number" name="n_co_directeur" id="n_co_directeur" value="<?php if(isset($saveNCoDirecteur)) echo $saveNCoDirecteur; ?>"/></br>

            <!--<span class="tooltip">Veillez remplir un code TDF</span>-->
            </br>
           </br></br>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>
    <script type="text/javascript" src="../js/verifFormulaire.js"></script
</div>

<?php
    include("includes/footer.php");
?>