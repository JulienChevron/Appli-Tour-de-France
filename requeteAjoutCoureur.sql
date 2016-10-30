select * from TDF_COUREUR order by n_coureur desc;

select max(n_coureur)+1 from TDF_COUREUR;



INSERT INTO TDF_COUREUR (N_COUREUR, NOM, PRENOM, ANNEE_NAISSANCE, CODE_TDF, ANNEE_PREM, COMPTE_ORACLE, DATE_INSERT)
values ( (select max(n_coureur)+1 from TDF_COUREUR), 'BARAN', 'Hugo', '1997', 'FRA', '2016', USER , sysdate);


select * from TDF_COUREUR where n_coureur between 1480 and 1490;
delete from TDF_COUREUR where n_coureur > 1480;
