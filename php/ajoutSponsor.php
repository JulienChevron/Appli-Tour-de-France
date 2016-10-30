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

        function selectCodetdf($bdd){
            echo "PASS : 1";
            $sql = "select code_tdf from tdf_pays";
            $tab = LireDonneesPDO3($bdd,$sql);
            creerListe($tab);
        }

        if(isset($_POST['Envoyer'])){
            include('ajoutCoureurFonc.php');
        }
    ?>

    <form method="post" name="form" id="form" onsubmit="return valider(this);">
        <label class="form_col" for="n_equipe">N_EQUIPE :</label>
        <input type="text" name="n_equipe" id="n_equipe" value="<?php if(isset($saveNEquipe)) echo $saveNEquipe; ?>"/></br>
        <label class="form_col" for="nom">Nom du sponsor:</label>
        <input type="text" name="nom" id="nom" value="<?php if(isset($saveNom)) echo $saveNom; ?>"/></br>
        <label class="form_col" for="na_sponsor">NA_SPONSOR :</label>
        <input type="text" name="na_sponsor" id="na_sponsor" value="<?php if(isset($saveNaSponsor)) echo $saveNaSponsor; ?>"/></br>
        <label class="form_col" for="annee_sponsor">ANNEE_SPONSOR :</label>
        <input type="number" name="annee_sponsor" id="annee_sponsor" min="1900" max="2016" value="<?php if(isset($saveAnneeSponsor)) echo $saveAnneeSponsor; ?>"/></br>
        <label class="form_col" for="code_tdf">Code tdf :</label>
            <select name="code_tdf" id="code_tdf">
                <?php 
                    selectCodetdf($conn);
                ?>
            </select>
            <!--<span class="tooltip">Veillez remplir un code TDF</span>-->
            </br>F
           </br></br>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>

    <script type="text/javascript" src="../js/verifFormulaire.js"></script>

</div>

<?php
    include("includes/footer.php");
?>