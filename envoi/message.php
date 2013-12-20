<?php

	session_start();
	$lang=$_POST['selectLang'];
	$nomfic=fopen('testons.txt', 'r+');
	fwrite($nomfic, "$lang");
	fclose($nomfic);
	$_SESSION['lang']=$lang;
//function to_lang($string, $lang)
//{
	//$result = "";
	//
	//switch($string) {
		//case 'Message':
			//if ($lang=="fr") return "Message" ; return "Message";
			//break;
		//case 'Poster message':
			//if ($lang=="fr") return "Poster message" ; return "Post message";
			//break;
		//case 'Deconnexion':
			//if ($lang=="fr") return "Deconnexion" ; return "Disconnect";
			//break;
		//~ case 'Identifiant':
			//~ if ($lang=="fr") return "Identifiant" ; return "Connect";
			//~ break;
		//~ case 'Inscription':
			//~ if ($lang=="fr") return "S'inscrire" ; return "Sign in";
			//~ break;
	//}
//}
//~ session_start();
//~ 
	//~ $_SESSION['Francaismessage_string'] = "Message : ";
	//~ $_SESSION['Francaispost_button'] = "Poster Message";
	//~ $_SESSION['Francaispseudo_string'] = "Identifiant : ";
	//~ $_SESSION['Francaispaswd_string'] = "Mot de Passe : ";
	//~ $_SESSION['Francaisconnect_button'] = "Se Connecter";
//~ 
	//~ $_SESSION['Englishmessage_string'] = "Messagge : ";
	//~ $_SESSION['Englishpost_button'] = "Post Message";
	//~ $_SESSION['Englishpseudo_string'] = "Log : ";
	//~ $_SESSION['Englishpaswd_string'] = "Password : ";
	//~ $_SESSION['Englishconnect_button'] = "Connect";
//~ 
	//~ $_SESSION['lang'] = "English";


//if (isset($_POST['lang']))
//{
	//$_SESSION['lang'] = $_POST['lang'];
//}
//else
//{
	//$_SESSION['lang'] = 'Francais';
//}

?>
