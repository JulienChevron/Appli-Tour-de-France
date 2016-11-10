<?php
    $pwd='../';
    include("includes/header.php");

    // Pour traiter l'ajout et récupérer les données
    if(isset($_POST['Envoyer'])){
        include('ajoutAnneeFonc.php');
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
<!-- Formulaire d'ajout d'une année-->
<div id="contenu" >
    <h2>Ajouter une année</h2>
    <form method="post" name="form" id="form" onsubmit="return valider(this);">
        <label class="form_col" for="annee">Année :</label>
        <input type="number" name="annee" id="annee" min="2016" max="2050" value="<?php if(isset($saveAnnee)) echo $saveAnnee; ?>"/></br>
        <label class="form_col" for="repos">Jour(s) de repos :</label>
        <input type="number" name="repos" id="repos" min="0" max="10" value="<?php if(isset($saveRepos)) echo $saveRepos; ?>"/></br>
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