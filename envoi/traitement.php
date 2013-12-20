<?php
/* Fichier traitement.php
 * affichage du message dans la zone réservée
 */

	date_default_timezone_set('UTC');
	$pseudo = $_SESSION['nom'];
	
	$message = $_POST['message'];

	$nomfichier = fopen('contenu.txt', 'a');

	fwrite($nomfichier,$pseudo." (".date("d/m/y H:i:s").") : ".$message."<br/>");
	fclose($nomfichier);


?>
