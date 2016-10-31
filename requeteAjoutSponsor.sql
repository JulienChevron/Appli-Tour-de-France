select max(n_sponsor)+1 from TDF_SPONSOR;

INSERT INTO TDF_SPONSOR ( N_EQUIPE, N_SPONSOR, NOM, NA_SPONSOR,  CODE_TDF, ANNEE_SPONSOR, COMPTE_ORACLE, DATE_INSERT)
                values (1, (select max(n_sponsor)+1 from TDF_SPONSOR), 'TEST nom', 'LOT', 'FRA', 2016 , USER , sysdate);