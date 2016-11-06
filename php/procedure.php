<?php 





$sql = "create or replace PROCEDURE CREER_CLASSEMENT_2016 AS

  maVue varchar2(6000);
BEGIN
     maVue := 'create or replace view TDF_CLASSEMENT_2016 as
     select ANNEE,rownum as CLASSEMENT, N_COUREUR, NOM, 
PRENOM,TEMPS_TOTAL from
     (
       select ANNEE,to_char(N_COUREUR) as N_COUREUR, NOM, PRENOM, 
sum(TOTAL_SECONDE) +nvl(DIFFERENCE,0) as TEMPS_TOTAL
       from TDF_COUREUR
       join TDF_TEMPS using(N_COUREUR)
       join TDF_PARTI_COUREUR using(N_COUREUR, ANNEE)
       left join TDF_TEMPS_DIFFERENCE using(N_COUREUR, ANNEE)
       where (N_COUREUR,ANNEE) not in
       (
         select N_COUREUR,ANNEE from TDF_ABANDON
       )
       and ANNEE=2016 and VALIDE=''O''
       group by ANNEE,N_COUREUR, NOM, PRENOM , DIFFERENCE
       union
       select ANNEE, ''0000'', substr(NOM,1,2)||''----'', PRENOM, 
sum(TOTAL_SECONDE) +nvl(DIFFERENCE,0) as TEMPS_TOTAL
       from TDF_COUREUR
       join TDF_TEMPS using(N_COUREUR)
       join TDF_PARTI_COUREUR using(N_COUREUR, ANNEE)
       left join TDF_TEMPS_DIFFERENCE using(N_COUREUR,ANNEE)
       where (N_COUREUR,ANNEE) not in
       (
         select N_COUREUR,ANNEE from TDF_ABANDON
       )
       and ANNEE=2016 and VALIDE=''R''
       group by ANNEE,NOM, PRENOM , DIFFERENCE
       order by TEMPS_TOTAL
     )';
     
     EXECUTE IMMEDIATE maVue;

END CREER_CLASSEMENT_2016;";



	include('fonction_oracle.php');
  include('includes/connexionBDD.php');

if (!$conn->query($sql)) {
	Afficher($sql);
    echo "Echec lors de la création de la procédure stockée";
}else{
	Afficher($sql);
	echo "OK";
	if (!$conn->query("CALL CREER_CLASSEMENT_2016()")) {
	 echo "Echec lors de l'appel à la procédure stockée : (" . $conn->errno . ") " . $conn->error;
	}else{
    echo "OK2";
	   $sql3 = 'SELECT * FROM TDF_CLASSEMENT_2016';
		$reponse2 = $conn->query($sql3);
		Afficher($reponse2);
	 	while ($donnees = $reponse2->fetch())
	    {   
	    	echo $donnees['N_COUREUR'] . "    ";
	    }
	}
	
}

$sql2 = 'SELECT * FROM tdf_annee';
	$reponse = $conn->query($sql2);
 	while ($donnees = $reponse->fetch())
    {   
    	echo $donnees['ANNEE'] . "    ";
    }

?>