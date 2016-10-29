<?php

//---------------------------------------------------------------------------------------------
function ConnecterPDO($db,$db_username,$db_password)
{
	try
	{
		$conn = new PDO($db,$db_username,$db_password);
		$res = true;
		return $conn;
	}
	catch (PDOException $erreur)
	{
		echo $erreur->getMessage();
	}
}
//---------------------------------------------------------------------------------------------
function majDonnees($conn,$sql)
{
	$stmt = $conn->exec($sql);
	return $stmt;
}
//---------------------------------------------------------------------------------------------
function preparerRequete($conn,$sql)
{
	$cur = $conn->prepare($sql);
	return $cur;
}
//---------------------------------------------------------------------------------------------
function ajouterParam($cur,$param,$contenu,$type='texte',$taille=0) // fonctionne avec preparerRequete
{
// Sur Oracle, on peut tout passer sans préciser le type. Sur MySQL ???
//	if ($type == 'nombre')
//		$cur->bindParam($param, $contenu, PDO::PARAM_INT);
//	else
		//$cur->bindParam($param, $contenu, PDO::PARAM_STR, $taille);
	$cur->bindParam($param, $contenu);
	return $cur;
}
//---------------------------------------------------------------------------------------------
function majDonneesPreparees($cur) // fonctionne avec ajouterParam
{
	$res = $cur->execute();
	return $res;
}
//---------------------------------------------------------------------------------------------
function majDonneesPrepareesTab($cur,$tab) // fonctionne directement après preparerRequete
{
	$res = $cur->execute($tab);
	return $res;
}//---------------------------------------------------------------------------------------------
function LireDonneesPDO1($conn,$sql)
{
  $i=0;
  foreach  ($conn->query($sql,PDO::FETCH_ASSOC) as $ligne)     
    $tab[$i++] = $ligne;
  return $tab;
}
//---------------------------------------------------------------------------------------------
function LireDonneesPDOPreparee($cur)
{
  $res = $cur->execute();
  $tab = $cur->fetchall();
  return $tab;
}
//---------------------------------------------------------------------------------------------
function LireDonneesPDO2($conn,$sql)
{
  $i=0;
  $cur = $conn->query($sql);
  while ($ligne = $cur->fetch(PDO::FETCH_ASSOC))
    $tab[$i++] = $ligne;
  return $tab;
}
//---------------------------------------------------------------------------------------------
function LireDonneesPDO3($conn,$sql)
{
  $cur = $conn->query($sql);
  $tab = $cur->fetchall(PDO::FETCH_ASSOC);
  return $tab;
}
//---------------------------------------------------------------------------------------------
function AfficherDonnee($tab)
{
  foreach($tab as $ligne)
  {
    foreach($ligne as $cle =>$valeur)
	{
		$valeur = utf8_encode($valeur);
		echo $cle.":".$valeur."\t";
	}
    echo "<br/>";
  }
}
//---------------------------------------------------------------------------------------------
function creerListe($tab)
{
  foreach($tab as $ligne)
  {
    foreach($ligne as $cle =>$valeur)
	{
		$valeur = utf8_encode($valeur);
		echo "<option value='" . $valeur . "'>" . $valeur . "</option>";
	}
  }
}
//---------------------------------------------------------------------------------------------
function Afficher($obj)
{
	echo "<pre><hr/>";
	print_r($obj);
	echo "</pre><hr/>";
}
/* doc
$hote = '127.0.0.1';
$port = '1521'; // port par défaut
$service = 'TEST';
$utilisateur = 'TEST';
$motdepasse = 'MotDePasse';

$lien_base =
"oci:dbname=(DESCRIPTION =
(ADDRESS_LIST =
	(ADDRESS =
		(PROTOCOL = TCP)
		(Host = ".$hote .")
		(Port = ".$port."))
)
(CONNECT_DATA =
	(SERVICE_NAME = ".$service.")
)
)";

*/
 ?>