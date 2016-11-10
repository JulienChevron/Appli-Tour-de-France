<?php

    ¨//Page non fonctionnelle

    $pwd='../';
    include("includes/header.php");

    if(isset($_POST['Envoyer'])){
        include('ajoutEpreuveFonc.php');
    }
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
    <h2>Ajouter une epreuve</h2>
    <form method="post" name="form" id="form" onsubmit="return valider(this);">
        <label class="form_col" for="annee">Année :</label>
            <select name="annee" id="annee">
                <?php 
                    selectAnneeCoureur($conn);
                ?>
            </select>
        <label class="form_col" for="codeD">Pays Départ :</label>
            <select name="codeD" id="codeD">
                <?php 
                    selectCodetdf($conn);
                ?>
            </select>
        <label class="form_col" for="codeA">Pays Arrivée :</label>
            <select name="codeA" id="codeA">
                <?php 
                    selectCodetdf($conn);
                ?>
            </select>
        <label class="form_col" for="num">Numéro epreuve :</label>
        <input type="number" name="num" id="num" min="0" maxlength="21" value="<?php if(isset($saveNum)) echo $saveNum; ?>"/></br>
        <label class="form_col" for="villeD">Ville de départ :</label>
        <input type="text" name="villeD" id="villeD" maxlength="50" value="<?php if(isset($saveVilleD)) echo $saveVilleD; ?>"/></br>
        <label class="form_col" for="villeA">Ville d'arrivée :</label>
        <input type="text" name="villeA" id="villeA" maxlength="50" value="<?php if(isset($saveVilleA)) echo $saveVilleA; ?>"/></br>
        <label class="form_col" for="distance">Distance :</label>
        <input type="number" name="distance" id="distance" min="0" maxlength="400" value="<?php if(isset($saveDist)) echo $saveDist; ?>"/> Km</br>
        <label class="form_col" for="jour">Jour :</label>
        <input type="text" name="jour" id="jour" placeholder="21/07/17" pattern="[0-3]{1}[0-9]{1}/[0-1]{1}[0-9]{1}/[0-9]{2}" value="<?php if(isset($saveDate)) echo $saveDate; ?>"/></br>
         <label class="form_col" for="cat">Catégorie :</label>
            <select name="cat" id="cat">
                <?php 
                    selectCatEpreuve($conn);
                ?>
            </select>
        </br></br>
        <input type="submit" name="Envoyer" id="Envoyer"/>
    </form>

    <script type="text/javascript" src="../js/verifFormulaire.js"></script>
</div>

<?php
    include("includes/footer.php");
?>

</body>
</html>