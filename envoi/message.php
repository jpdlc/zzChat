<?php
/* Fichier message.php
 * enregistrement langue choisie :-D
 */

	session_start();
	$lang=$_POST['selectLang'];

	$_SESSION['lang']=$lang;


?>
