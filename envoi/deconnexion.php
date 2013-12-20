<?php

session_start();
$login = $_POST['login'];

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
//echo "apres while";
//echo "<br>";


//if (in_array($login, $connectes))
//{
	//echo "#yes!!#";
	//echo "<br>";
//}
//else
//{
	//echo "chite!";
	//echo "<br>";
//}

fclose($nomfic);

//echo "<br>";
//print_r($connectes);
//echo "<br>";
//echo "<br>";
$trouve=array_search($login, $connectes);
	
echo '<p>'.to_lang($_SESSION['lang']).'</p>' ;

session_destroy();
session_start();
//setcookie("auth", "", time() - 3600);

if ($trouve != 999)
{
	//echo "dans if";
	

	array_splice($connectes, $trouve, 1);
	
	//print_r($connectes);
	$nomficbis = fopen('connectes.txt', 'w');
	if (ftruncate($nomficbis, 0))
	{
		echo "";
	}
	else
	{
		echo "erreur truncate. merci de prevenir le webmaster";
	}
	rewind($nomficbis);


	$i=0;
	while($i<count($connectes))
	{
		fwrite($nomficbis, $connectes[$i]);
		if ($i <count($connectes)-1)
		{
			fwrite($nomficbis, "\n"); //passage a la ligne
		}
		
		
		$i++;
	}

	//print_r($connectes);
	//fwrite($nomficbis, $connectes[0]);
	
	
	fclose($nomficbis);
	
	//set($_COOKIE['auth'], "", time() - 3600);

	header("Refresh: 1; URL=index1.php");
}
else
{
	echo "merde !";
}


?>

