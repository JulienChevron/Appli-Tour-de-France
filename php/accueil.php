<?php 
    $pwd='../';
    include("includes/header.php");
	include("includes/assets.php");
?>
            <div id="contenu">
				<?php if(estAdmin()){
						echo '<h2>Interface de gestion de l\'administrateur.</h2>';
						echo '<center><a href="https://spartacus.iutc3.unicaen.fr/~projet.agilea/old/php/gestionProduitAdministrateur.php">Gérer les annonces</a></center>';
						echo '<center><a href="https://spartacus.iutc3.unicaen.fr/~projet.agilea/old/php/gestionClubAdministrateur.php">Gérer les clubs</a></center>';
				}?>
				
                <h2>Application web de la base de données du Tour de France</h2>
                <p>
                    Notre site permet de consulter les données des différents Tour de France.
				</p>

            </div>
<?php include("includes/footer.php"); ?>