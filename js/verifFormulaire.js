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

   
   if(nom && prenom && naissance && tour)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}