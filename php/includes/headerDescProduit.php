<!DOCTYPE html">
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Diving Deal</title>
    <!--[if IE]>
<style type="text/css">
html pre
{
width: 636px ;
}
</style>
<![endif]-->

    <link href="<?php echo $pwd; ?>css/DescProduit.css" rel="stylesheet" media="all" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $pwd; ?>css/bootstrap.min.css">
    <script src="<?php echo $pwd; ?>js/jquery.min.js"></script>
    <script src="<?php echo $pwd; ?>js/bootstrap.min.js"></script>
	<link rel="SHORTCUT ICON" href="<?php echo $pwd; ?>image/favicon.ico" />

</head>

<header>
    <img style=" padding-left: 15%" id="logo" height="75" src="<?php echo $pwd; ?>image/logo4.png" />
</header>

<body>
    <div id="conteneur">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="carousel-page">
                        <img src="<?php echo $pwd; ?>image/mer.jpeg" alt="mer">
                    </div>
                </div>

                <div class="item">
                    <div class="carousel-page">
                        <img src="<?php echo $pwd; ?>image/mer2.jpg" alt="mer2">
                    </div>
                </div>

                <div class="item">
                    <div class="carousel-page">
                        <img src="<?php echo $pwd; ?>image/mer3.jpg" alt="mer3">
                    </div>
                </div>

                <div class="item">
                    <div class="carousel-page">
                        <img src="<?php echo $pwd; ?>image/mer4.jpg" alt="mer4">
                    </div>
                </div>


                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <nav>
                <ul id="menu">
                    <li><a href="https://spartacus.iutc3.unicaen.fr/~projet.agilea/old/php/accueil.php">Accueil</a></li>
                    <li><a href="https://spartacus.iutc3.unicaen.fr/~projet.agilea/old/php/catalogue.php">Je veux acheter</a></li>
                    <li><a href="https://spartacus.iutc3.unicaen.fr/~projet.agilea/old/php/vendre.php">Je veux vendre</a></li>
                    <li><a href="https://spartacus.iutc3.unicaen.fr/~projet.agilea/old/php/carte.php">Clubs partenaires</a></li>
                    <li><a href="https://spartacus.iutc3.unicaen.fr/~projet.agilea/old/php/formInscription.php">Connexion / Inscription</a></li>
					
                </ul>
            </nav>