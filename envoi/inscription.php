<?php

/* Fichier inscription.php
 * gère l'inscription d'un nouveau venu
 */
	session_start();
	
	//gère l'affichage en fonction de la langue choisie
	function to_lang($string, $lang)
	{
		$result = "";
		
		switch($string) {
			case 'Bienvenue':
				if ($lang=="Francais") return "Bienvenue ! Vous pouvez maintenant vous connecter." ; return "Welcome ! You're now allowed to connect.";
				break;
				case 'Indisponible':
				if ($lang=="Francais") return "Pseudo indisponible" ; return "Login not available";
				break;
			case 'Connexion':
				if ($lang=="Francais") return "Se connecter" ; return "Connect";
				break;
			case 'Inscription':
				if ($lang=="Francais") return "S'inscrire" ; return "Sign in";
				break;
		}
	}

	function checkParam($param)
	{
	
		return isset($param) && !empty($param);
	}
	
	function inscrire($login, $mdp)
	{
		$nomfichier = fopen('id.txt', 'r+');
		$logtrouve = false;
	
		// parcours de id.txt à la recherche du pseudo
		while(!feof($nomfichier) && $logtrouve == false)
		{
			//$ligne = fgets($nomfichier);
			$ligne = substr(fgets($nomfichier), 0, -1);
		
			if (strcmp($ligne, $login) == 0) // Si le login est déjà utilisé
			{
	
				$logtrouve =true;
				echo to_lang('Indisponible', $_SESSION['lang']);
				header ("Refresh: 2;URL=formulaire.php");
			}
		

		}
		$ligne = fgets($nomfichier);
	
		fclose($nomfichier);

		// si le pseudo n'appartient à personne
		if ($logtrouve == false)
		{
			$nomfichier=fopen('id.txt', 'a'); 
			fwrite($nomfichier, $login); 
			fwrite($nomfichier, "\n");
			fwrite($nomfichier, md5($mdp));
			fwrite($nomfichier, "\n");
			echo to_lang('Bienvenue', $_SESSION['lang']);
			header ("Refresh: 2;URL=index1.php"); // le nouveau peut se connecter
		}
		fclose($nomfichier);
	}

if(checkParam ($_POST['pseudo']) && checkParam($_POST['mdp']) )
{
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];



	inscrire($pseudo, $mdp);

	
}
?>
