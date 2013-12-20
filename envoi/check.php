<?php


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
	$nomfichier = fopen('id.txt', 'r+');
	$nomfic = fopen('connectes.txt', 'r');
	
	$logtrouve =false;
	$mdptrouve =false;
	$logconnec =false;
	
	while(!feof($nomfichier) && $logtrouve != true)
	{
	
		
		//$ligne = fgets($nomfichier);
		$ligne = substr(fgets($nomfichier), 0, -1);
			
		
		if (strcmp($ligne, $login)==0)
		{
			
			$logtrouve =true;
			
			while(!feof($nomfic) && $logconnec != true)
			{
				$lig = substr(fgets($nomfic), 0, -1);
				
				if (strcmp($lig, $login) == 0)
				{
					$logconnec = true ;
					fclose($nomfic);
					fclose($nomfichier);
					echo "Utilisateur déjà en ligne. / User already online.";
					
				}
			}
			if ($logconnec != true )
			{

			
			//$ligne = fgets($nomfichier);
			$ligne = substr(fgets($nomfichier), 0, -1);
			
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
				header("Refresh: 0;URL=page1.php");
				
			}
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
	if (!$logtrouve)
	{
		echo"Mot de passe faux ou login inexistant. / Wrong password or not a user name.";
		
	}

}	
	
if(checkParam ($login) && checkParam($mdp) )
{
	

	signup($login, md5($mdp));

	
}
else
{	
	echo "Login AND password must be specified !";
}




?>
