<?php
/* Fichier check.php
 * veérifie si l'utilisateur peut se connecter
 */

session_start();

$pseudo=$_POST['pseudo'];
	
	
$tableau=explode("#", $pseudo);
$login = $tableau[0];
$mdp = $tableau[1];


function checkParam($param)
{
	
	return isset($param) && !empty($param);
}

function signup($login, $mdp)
{
	$nomfichier = fopen('id.txt', 'r+');//fichier contenant les identifiants des personnes inscrites
	$nomfic = fopen('connectes.txt', 'r');//fichier contenant les pseudos des personnes connectées
	
	$logtrouve =false;
	$mdptrouve =false;
	$logconnec =false;
	
	// tant que l'on n'a pas parcouru tous les pseudos existants et
	// tant que l'on n'a pas trouvé le pseudo
	while(!feof($nomfichier) && $logtrouve != true)
	{
	
		
		//$ligne = fgets($nomfichier);
		$ligne = substr(fgets($nomfichier), 0, -1);
			
		// si on a trouvé le pseudo
		if (strcmp($ligne, $login)==0)
		{
			
			$logtrouve =true;
			
			// tant que l'on n'a pas trouvé le pseudo et
			// tant que l'on n'a pas vérifié tous les pseudos des connectés
			while(!feof($nomfic) && $logconnec != true)
			{
				$lig = substr(fgets($nomfic), 0, -1);
				
				//si ce pseudos est déjà connecté
				if (strcmp($lig, $login) == 0)
				{
					$logconnec = true ;
					fclose($nomfic);
					fclose($nomfichier);
					echo "Utilisateur déjà en ligne. / User already online.";
					
				}
			}
			
			//si ce pseudo n'est pas encore connecté
			if ($logconnec != true )
			{

			
				//$ligne = fgets($nomfichier);
				$ligne = substr(fgets($nomfichier), 0, -1);
			
				//vérification mot de passe correct
				if (strcmp($ligne, $mdp)==0)
				{
					$mdptrouve =true;
					
					$_SESSION['nom'] = $login;
					//setcookie("auth", $login, time()+36000);
				
					fclose($nomfic);
					$nomfic = fopen('connectes.txt', 'a');
					
					if ($nomfic == NULL)
					{
						fclose($nomfic);
						echo "pbm ouverture";
					}
				
					fwrite($nomfic, $_SESSION['nom']); 
					fwrite($nomfic, "\n");
					fclose($nomfic);
					setcookie('nom', $login);
					header("Refresh: 0;URL=page1.php");
				
				}
			
				//mot de passe faux
				else
				{
					fclose($nomfic);
					echo "Mot de passe faux ou login inexistant. / Wrong password or not a user name.";
				
				}
			}
		}
		$ligne = fgets($nomfichier);
	}
	fclose($nomfic);
	fclose($nomfichier);
	
	//login faux
	if (!$logtrouve)
	{
		echo"Mot de passe faux ou login inexistant. / Wrong password or not a user name.";
		
	}

}	
	
if(checkParam ($login) && checkParam($mdp) )
{
	

	signup($login, md5($mdp));

	
}

// si formulaire pas entièrement rempli
else
{	
	echo "Login AND password must be specified !";
}




?>
