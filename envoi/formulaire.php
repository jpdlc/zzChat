<?php
session_start();

function to_lang($string, $lang)
{	
	
	switch ($string)
	{
		case 'Formulaire':
			if ($lang=="fr") return "Formulaire d'inscription" ; return "Registration form";
			break;
		case 'Identifiant':
			if ($lang=="fr") return "Identifiant" ; return "Login";
			break;
		case 'Mdp':
			if ($lang=="fr") return "Mot de passe" ; return "Password";
			break;
		case 'Mdp2':
			if ($lang=="fr") return "Mot de passe (bis)" ; return "Re-Password";
			break;
		case 'Envoi' :
			if ($lang=="fr") return "Rejoins les autres !" ; return "Join the others !";
			break;
	 }
}

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="accueil.css"/>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="main.js"></script>
		<script type="text/javascript" src="jquery.validate.min.js"></script>	
		<script>

			
			
			
		
		$(document).ready(Verifier);
			
		</script>	
	
	</head>
	<body>
		<h1>Formulaire d'inscription</h1>

	
	</body>
		<form id="form1" action="inscription.php" method="post">
			<p>
		
		<?php
			echo '<p><label for="pseudo">' .to_lang('Identifiant', $_SESSION['lang']). '</label></p>
			<p><input type="text" name="pseudo" id="pseudo" /></p>
			<p><label for="mdp">' .to_lang('Mdp', $_SESSION['lang']). '</label></p>
			<p><input type="password" name="mdp" /></p>
			<p><label for="mdp">' .to_lang('Mdp2', $_SESSION['lang']). '</label></p>
			<p><input type="password" name="mdp" /></p>
			<p><input type="submit" value="'.to_lang('Envoi', $_SESSION['lang']).'" /></p>';
		?>
		
	</form>
	
	
</html>

