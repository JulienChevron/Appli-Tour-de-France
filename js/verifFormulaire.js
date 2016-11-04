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

function valider(f)
{
   var nom = verifText(f.nom);
   var prenom = verifText(f.prenom);
   var code = verifText(f.code_tdf);
   
   if(nom && prenom && code){
      return true;
   }
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}