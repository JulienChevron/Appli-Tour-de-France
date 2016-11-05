<?php
    $pwd='../';
    include("includes/header.php");

    if(isset($_POST['Envoyer'])){
        include('ajoutSponsorFonc.php');
    }
?>

 <div id="contenu" >

    <h2>Ajouter un sponsor</h2>
    <form method="post" name="form" id="form" onsubmit="return valider(this);">
        <label class="form_col" for="n_equipe">Numéro de l'équipe :</label>
        <input type="number" name="n_equipe" id="n_equipe" value="<?php if(isset($saveNEquipe)) echo $saveNEquipe; ?>"/></br>
        <label class="form_col" for="nom">Nom du sponsor:</label>
        <input type="text" name="nom" id="nom" placeholder="Française Des Jeux" value="<?php if(isset($saveNom)) echo $saveNom; ?>"/></br>
        <label class="form_col" for="na_sponsor">Nom abrégé du sponsor :</label>
        <input type="text" name="na_sponsor" id="na_sponsor" placeholder="FDJ" value="<?php if(isset($saveNaSponsor)) echo $saveNaSponsor; ?>"/></br>
        <label class="form_col" for="annee_sponsor">Année de début (pour une équipe) :</label>
        <input type="number" name="annee_sponsor" id="annee_sponsor" min="1900" max="2016" value="<?php if(isset($saveAnneeSponsor)) echo $saveAnneeSponsor; ?>"/></br>
        <label class="form_col" for="code_tdf">Nationalité :</label>
            <select name="code_tdf" id="code_tdf">
                <?php 
                    selectCodetdf($conn);
                ?>
            </select>
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