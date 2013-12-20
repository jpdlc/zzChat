<?php

	$messages = array();
	$nomfichier = fopen('contenu.txt', 'r');
	while(!feof($nomfichier))
	{
		
		array_push($messages,fgets($nomfichier));
		
	}
	fclose($nomfichier);
	
	/*
	 * Concatene les elements du tableau entre eux en les acollant à des <br/>
	 */
	$sortie=implode("<br/>",$messages);
	
	$test = fopen('test.txt','w');
	fwrite($test,$sortie);
	fclose($test);
	
	echo $sortie;

?>
