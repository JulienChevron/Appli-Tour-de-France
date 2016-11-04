function verifText(champ)
{
   if(champ.value == "")
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

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

function verifierAge(champsAge,champsTour){
   var naiss = champsAge.value;
   var date = champsTour.value;

   if(date-naiss>18 || naiss == '' || date == ''){
      surligne(champsAge, false);
      surligne(champsTour, false);
      return true;
   }else{
      surligne(champsAge, true);
      surligne(champsTour, true);
      return false;
   }
}

function valider(f)
{
   var nom = verifText(f.nom);
   var prenom = verifText(f.prenom);
   var code = verifText(f.code_tdf);
   var age = verifierAge(f.annee_naiss, f.annee_prem);
   
   if(nom && prenom && code){
      if(age){
         return true;
      }else{
         alert("Le coureur doit avoir plus de 18 ans pour participer");
         return false;
      }
   }
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}