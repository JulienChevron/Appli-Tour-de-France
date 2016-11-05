<?php
    $pwd='../';
    include("includes/header.php");
?>

 <div id="contenu" >
    <form method="get" name="form" id="form" action="<?=$_SERVER['PHP_SELF']?>">
        <label class="form_col" for="recherche">Recherche :</label>
        <input type="text" name="recherche" id="recherche"/></br>
        <label class="form_col" for="annee_prem">Année de premier tour :</label>
        <input type="number" name="annee_prem" id="annee_prem" min="1900" max="2016"/>
        <label class="form_col" for="code_tdf">Code tdf :</label>
            <select name="code_tdf" id="code_tdf">
                <?php 
                    selectCodetdf($conn);
                ?>
            </select>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>

    <?php
        if(isset($_GET['supp'])){
            if($_GET['supp']=='ok')
                echo "Sponsor supprimé";
            else
                echo "Suppression impossible, le sponsor a déjà participé au tour";
        }
        include('consulterSponsorFonc.php');
        afficherSponsor($conn);
    ?>
</div>

<?php
    include("includes/footer.php");
?>