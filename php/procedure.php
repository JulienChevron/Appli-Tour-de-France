<?php 

/*$sql = "create or replace PROCEDURE CREER_CLASSEMENT AS

  maVue varchar2(6000);
  cursor cannee is select ANNEE from TDF_ANNEE order by ANNEE;
  vannee varchar2(5);
BEGIN
   open cannee;
   loop
     fetch cannee into vannee;
     exit when cannee%notfound;
     maVue := 'create or replace view TDF_CLASSEMENT'||vannee||' as
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
       and ANNEE='||vannee||' and VALIDE=''O''
       group by ANNEE,N_COUREUR, NOM, PRENOM , DIFFERENCE
       union
       select ANNEE,''------'', substr(NOM,1,2)||''----'', PRENOM, 
sum(TOTAL_SECONDE) +nvl(DIFFERENCE,0) as TEMPS_TOTAL
       from TDF_COUREUR
       join TDF_TEMPS using(N_COUREUR)
       join TDF_PARTI_COUREUR using(N_COUREUR, ANNEE)
       left join TDF_TEMPS_DIFFERENCE using(N_COUREUR,ANNEE)
       where (N_COUREUR,ANNEE) not in
       (
         select N_COUREUR,ANNEE from TDF_ABANDON
       )
       and ANNEE='||vannee||' and VALIDE=''R''
       group by ANNEE,NOM, PRENOM , DIFFERENCE
       order by TEMPS_TOTAL
     )';

     Dbms_Output.Put_Line(vannee);
     EXECUTE IMMEDIATE maVue;
   end loop;
END CREER_CLASSEMENT;";*/

$sql = "create or replace PROCEDURE CREER_CLASSEMENT_2011 AS

  maVue varchar2(6000);
BEGIN
     maVue := 'create or replace view TDF_CLASSEMENT_2011 as
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
       and ANNEE=2011 and VALIDE=''O''
       group by ANNEE,N_COUREUR, NOM, PRENOM , DIFFERENCE
       union
       select ANNEE,''------'', substr(NOM,1,2)||''----'', PRENOM, 
sum(TOTAL_SECONDE) +nvl(DIFFERENCE,0) as TEMPS_TOTAL
       from TDF_COUREUR
       join TDF_TEMPS using(N_COUREUR)
       join TDF_PARTI_COUREUR using(N_COUREUR, ANNEE)
       left join TDF_TEMPS_DIFFERENCE using(N_COUREUR,ANNEE)
       where (N_COUREUR,ANNEE) not in
       (
         select N_COUREUR,ANNEE from TDF_ABANDON
       )
       and ANNEE=2011 and VALIDE=''R''
       group by ANNEE,NOM, PRENOM , DIFFERENCE
       order by TEMPS_TOTAL
     )';
     
     EXECUTE IMMEDIATE maVue;

END CREER_CLASSEMENT_2011;";

	include('fonction_oracle.php');
          
    $session = "ETU2_51";
    $mdp = "ETU2_51";
    $instance = "oci:dbname=info";
    $conn = ConnecterPDO($instance,$session,$mdp);

if (!$conn->query($sql)) {
	Afficher($sql);
    echo "Echec lors de la création de la procédure stockée";
}else{
	Afficher($sql);
	echo "OK";
	if (!$conn->query("CALL CREER_CLASSEMENT_2011()")) {
	 echo "Echec lors de l'appel à la procédure stockée : (" . $conn->errno . ") " . $conn->error;
	}else{
	   $sql3 = 'SELECT * FROM TDF_CLASSEMENT_2011';
		$reponse2 = $conn->query($sql3);
		Afficher($reponse2);
	 	while ($donnees = $reponse2->fetch())
	    {   
	    	echo $donnees['NOM'] . "    ";
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