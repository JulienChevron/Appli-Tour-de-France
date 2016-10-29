<!DOCTYPE html">
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Base de données du Tour de France</title>
    <!--[if IE]>
<style type="text/css">
html pre
{
width: 636px ;
}
</style>
<![endif]-->

    <link href="<?php echo $pwd; ?>css/Accueil.css" rel="stylesheet" media="all" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $pwd; ?>css/bootstrap.min.css">
    <script src="<?php echo $pwd; ?>js/jquery.min.js"></script>
    <script src="<?php echo $pwd; ?>js/bootstrap.min.js"></script>
	<link rel="SHORTCUT ICON" href="<?php echo $pwd; ?>image/logoTDF.png" />

</head>

<header>
    <label style=" padding-left: 15% ; font-size:50" id="titre"> Base de données du Tour de France </label>  
</header>

<body style="background-color: lightgrey">
    <div id="conteneur">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <!--<ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
				
            </ol>-->

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="carousel-page">
                        <img src="<?php echo $pwd; ?>image/image1.jpg" alt="img1">
                    </div>
                </div>

                <div class="item">
                    <div class="carousel-page">
                        <img src="<?php echo $pwd; ?>image/image2.png" alt="img2">
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
            </div>

            <nav class="navbar navbar-inverse" role="navigation">
                <div id="menu" class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="../php/accueil.php">Accueil</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ajout dans la base
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../php/ajoutCoureur.php">Ajouter un coureur</a></li>
                            <li><a href="../php/ajoutSponsor.php">Ajouter un sponsor</a></li>
                            <li><a href="#">Ajouter un lama</a></li> 
                        </ul>
                        </li>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultation dans la base
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../php/consulterCoureur.php">Consulter les coureurs</a></li>
                            <li><a href="#">Consulter les sponsors</a></li>
                            <li><a href="#">Ajouter les lamas</a></li> 
                        </ul>
                        </li>
                    </ul>
                </div>
            </nav>


            <!--<nav>
                <ul id="menu" >
                    <li><a href="../php/accueil.php">Accueil</a></li>
                    <li><a href="../php/ajoutCoureur.php">Ajouteur un coureur</a></li>
                    <li><a href="../php/ajoutEquipe.php">Ajouteur une equipe</a></li>
					<li><a href="../php/formLogIn.php">Connexion</a></li>						
				</ul>

            </nav>-->
				

		<div id="body-conteneur">