<?php

/*Fichier chargerUsers.php :
 * charge les usagers connectés et les écrits
 */

	$users = array();
	$nomfichier = fopen('connectes.txt', 'r');
	
	// tant qu'il y a d'autres usagers connectés
	while(!feof($nomfichier))
	{
		
		array_push($users,fgets($nomfichier));
		
	}
	fclose($nomfichier);
	
	
	// Concatene les elements du tableau entre eux en les acollant à des <br/>
	$sortie=implode("<br/>",$users);
	

	echo $sortie;

?>
