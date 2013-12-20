<?php

	$users = array();
	$nomfichier = fopen('connectes.txt', 'r');
	while(!feof($nomfichier))
	{
		
		array_push($users,fgets($nomfichier));
		
	}
	fclose($nomfichier);
	
	/*
	 * Concatene les elements du tableau entre eux en les acollant à des <br/>
	 */
	$sortie=implode("<br/>",$users);
	
	//$test = fopen('test1.txt','w');
	//fwrite($test,$sortie);
	//fclose($test);
	//
	echo $sortie;

?>
