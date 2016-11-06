<?php
    $pwd='../';
    include("includes/header.php");

    if(isset($_POST['Envoyer'])){
        include('ajoutPaysFonc.php');
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
    <h2>Ajouter un pays</h2>
    <form method="post" name="form" id="form" onsubmit="return valider(this);">
        <label class="form_col" for="pays">Pays :</label>
        <input type="text" name="pays" id="pays" maxlength="20" value="<?php if(isset($savePays)) echo $savePays; ?>"/></br>
        <label class="form_col" for="codetdf">Code Pays :</label>
        <input type="text" name="codetdf" id="codetdf" maxlength="3" value="<?php if(isset($saveCode)) echo $saveCode; ?>"/></br>
        <label class="form_col" for="paysInit">Initiales :</label>
        <input type="text" name="paysInit" id="paysInit" maxlength="3" value="<?php if(isset($savePaysInit)) echo $savePaysInit; ?>"/></br>
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