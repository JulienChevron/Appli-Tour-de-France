select *from TDF_EQUIPE_ANNEE;
select * from TDF_EQUIPE_ANNEE order by N_EQUIPE DESC;

select max(n_equipe)+1 from TDF_EQUIPE_ANNEE;
select * from TDF_EQUIPE where n_equipe=83;

INSERT INTO TDF_EQUIPE_ANNEE ( ANNEE, N_EQUIPE, N_SPONSOR, N_PRE_DIRECTEUR,  N_CO_DIRECTEUR, COMPTE_ORACLE, DATE_INSERT)
                values (2000, (select max(n_equipe)+1 from TDF_EQUIPE_ANNEE), (select max(n_sponsor) from TDF_SPONSOR), 999, null, USER , sysdate);
                