<?php
/* Fichier charger.php :
	fonction de chargement et écriture des messages
*/

	$messages = array(); //tableau contenant les messages
	$nomfichier = fopen('contenu.txt', 'r');
	
	while(!feof($nomfichier)) //tant qu'il y a des messages à charger, on les insère dansle tableau
	{
		
		array_push($messages,fgets($nomfichier));
		
	}
	fclose($nomfichier);
	
	// Concatene les elements du tableau entre eux en les acollant à des <br/>
	$sortie=implode("<br/>",$messages);
	

	
	echo $sortie;

?>
