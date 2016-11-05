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

       <form method="get" name="form" id="form" action="<?=$_SERVER['PHP_SELF']?>">
        <fieldset><legend>Fitlre</legend>
        <label class="form_col" for="nom">Nom :</label>
        <input type="text" name="nom" id="nom"/>
        <label class="form_col" for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom"/>
        <label class="form_col" for="annee_naiss">Année de naissance :</label>
        <input type="number" name="annee_naiss" id="annee_naiss" min="1900" max="2016"/></br>
        <label class="form_col" for="annee_prem">Année de premier tour :</label>
        <input type="number" name="annee_prem" id="annee_prem" min="1900" max="2016"/>
        <label class="form_col" for="code_tdf">Code tdf :</label>
            <select name="code_tdf" id="code_tdf">
                <?php 
                    selectCodetdf($conn);
                ?>
            </select>
        </br>
        <input type="submit" name="Envoyer" id="Envoyer"/>
        </fieldset>
    </form>

    <?php
        if(isset($_GET['supp'])){
            if(strcmp($_GET['supp'],'ok')==0)
                echo "Coureur supprimé";
            else if(strcmp($_GET['supp'],'erreur')==0)
                echo "Suppression impossible, le coureur a déjà participé au tour";
        }
        include('formatage.php');
        include('consulterCoureurFonc.php');
        afficherCoureur($conn);
    ?>
</div>

<?php
    include("includes/footer.php");
?>
</body>
</html>