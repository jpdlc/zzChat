<?php
/*
 * Fichier deconnexion.php
 * gère la déconnexion de l'utilisateur
 */
 
session_start();
$login = $_POST['login'];


// gère le message envoyé selon la langue choisie par l'utilisateur
function to_lang($lang)
{
	$result = "";
	
	if ($lang=="Francais") return "Vous êtes déconnecté" ; return "You are offline";
}

echo $login;
echo "<br>";
$connectes = array();
$nomfic = fopen('connectes.txt', 'r');
$trouve = 999;

//initialisation tableau des personnes connectées
$i = 0;

while(!feof($nomfic))
{
	//$ligne = substr(fgets($nomfic), 0, -1);
	$ligne = fgets($nomfic);
	//echo "<br>";
	//echo $ligne;
	$ligne = substr($ligne, 0, -1);
	//echo "<br>";
	array_push($connectes, $ligne);
	//print_r($connectes);
	$i++;
}


fclose($nomfic);


$trouve=array_search($login, $connectes);
	
echo '<p>'.to_lang($_SESSION['lang']).'</p>' ;

session_destroy();
session_start();


if ($trouve != 999)
{
	
	
	//suppression du login dans le tableau des connectés
	array_splice($connectes, $trouve, 1);
	
	
	$nomficbis = fopen('connectes.txt', 'w');
	
	if (ftruncate($nomficbis, 0))
	{
		echo "";
	}
	
	// si l'effacement du fichier a rencontré un erreur
	else
	{
		echo "erreur truncate. merci de prevenir le webmaster";
	}
	rewind($nomficbis);


	$i=0;
	//boucle de réécriture du fichier
	while($i<count($connectes))
	{
		fwrite($nomficbis, $connectes[$i]);
		if ($i <count($connectes)-1)
		{
			fwrite($nomficbis, "\n"); //passage a la ligne
		}
		
		
		$i++;
	}


	
	fclose($nomficbis);
	
	//redirige vers la page index1.php

	header("Refresh: 1; URL=index1.php");
}

//ça doit pas arriver
else
{
	echo "merde !";
}


?>

