<?php

    session_set_cookie_params(600);
	session_start();
	date_default_timezone_set('Europe/Paris');
function estAdmin(){
	if(isset($_SESSION['type']) AND $_SESSION['type'] == 'admin'){
		return true;
	}
	else{
		return false;
	}
 }
 
 function estClub(){
	if(isset($_SESSION['type']) AND $_SESSION['type'] == 'club'){
		return true;
	}
	else{
		return false;
	}
 }
 
 function afficherConnecte(){
	if(estClub()){
		return (isset($_SESSION['nom']))?$_SESSION['nom']:null;
	}
	else if (estAdmin()){
		return 'Administrateur';
	}
	else{
		return 'Invité';
	}
 }
	
?>

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
            <nav>
                <ul id="menu" >
                    <li><a href="../php/accueil.php">Accueil</a></li>
                    <li><a href="../php/ajoutCoureur.php">Ajouteur un coureur</a></li>
                    <li><a href="../php/ajoutEquipe.php">Ajouteur une equipe</a></li>
					<li><a href="../php/formLogIn.php">Connexion</a></li>						
				</ul>

            </nav><?php if(estClub() OR estAdmin()){ ?>
				<form style="text-align:center; display:inline-block; position:absolute; left:70%; top:10px;" method="post" action="logOut.php">
					<input type="submit" name="logout" id="logout" value="Déconnexion"/>
				</form>
				<p style="text-align:center; display:block; position:absolute; left:70%; top:0px;">
					Connecté en tant que 
				<strong><?php echo afficherConnecte() ?> :</strong>
				</p>
				
			<?php } ?>
				
				

		<div id="body-conteneur">