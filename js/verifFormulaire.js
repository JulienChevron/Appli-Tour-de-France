function verifText(champ)
{
   if(champ.value == "" || champ.value == "SELECTIONNEZ")
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifNumber(champ)
{
   var age = parseInt(champ.value);
   if(isNaN(age))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function Age(champNaissance, champPremier)
{
   var naissance = parseInt(champNaissance.value);
   var premier = parseInt(champPremier.value);
   if(premier-naissance>18)
   {
      surligne(champ, true);
      return true;
   }
   else
   {
      surligne(champ, false);
      return false;
   }
}

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

function valider(f)
{
   var nom = verifText(f.nom);
   var prenom = verifText(f.prenom);
   var naissance = verifNumber(f.annee_naiss);
   var tour = verifNumber(f.annee_prem);
   var code = verifText(f.code_tdf);
   var ageok = Age(f.annee_naiss,f.annee_prem);

   
   if(nom && prenom && naissance && tour && code){
      if(ageok){
         return true;
      }else{
         alert("Le coureur ne peut participer au tour avant 18 ans");
         return false;
      }
   }
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}