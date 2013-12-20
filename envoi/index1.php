<?php

/*Fichier index1.php
 * page d'accueil
 */
 
	session_start();
	
	$_SESSION['lang']="Francais";

	$nomfic=fopen('testons.txt', 'r+');
	fwrite($nomfic, "index1.php : ");
	fwrite($nomfic, $_SESSION['lang']);
	fclose($nomfic);
		
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="accueil.css"/>
			<title>zzChat</title>
			
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="main.js"></script>		
		<script>
			
			
			
		function verif()
		{		
			//pour gerer la verification des données transmise par l'utilisateurs
			$("#t").click(function() 
			{ 
				
				$.ajax(
				{
					url : "check.php", // on donne l'URL du fichier de traitement
					type : 'POST', // la requête est de type POST
					data : "pseudo=" + $("#pseudo").val() + "#" + $("#mdp").val(), //on envoie le pseudo concatene au mot de passe
					success : function(ok)
					{
						if (ok != "")
						{
							alert(ok);
						}
						else
						{
							$("#form1").submit();
						}
					},
					error : function(a1,a2,a3)
					{
						alert("Error");
					}
				});
			});		
		}
			
			
			
		function onChangeLang() 
		{
			//pour gerer le changement de langue
			$("#selectLang").change(function()
			{ 
	
				$.ajax(
				{
					
					url : "message.php", // on donne l'URL du fichier de traitement
					type : 'POST', // la requête est de type POST
					data : "lang=" + $("#selectLang option:selected").text(), // et on envoie nos données
					success : function(ok)
					{
						alert("Langue changée / Language changed"+ok);
						
					},
					error : function(a1,a2,a3)
					{
						alert("Error changement langue");
					}
				});

			});
		}
		

		$(document).ready(verif);
		$(document).ready(onChangeLang);
		</script>
	</head>
	<body>
		<h1>Hello, ca biche ?</h1>
	</body>
	
		<!-- Détail du formulaire lançant page1.php (connexion) -->
	
	<form id="form1" action="page1.php" method="POST">
	<div id = "ratel"></div>
			
			<p><label for="pseudo"> Identifiant / Username </label></p>
			<p><input type="text" name="pseudo" id="pseudo"/></p>
			<p><label for="mdp"> Mot de passe / Password </label></p>
			<p><input type="password" name="mdp" id="mdp" /></p>
		
			<p><input type="button" value="Connexion / Connect" id="t"  /></p>
			
	</form>

		<!-- Selecteur de langue -->
	<form method="post" action="message.php">
		<p><select id="selectLang">
				<option value="Francais">Francais</option>
				<option value="English">English</option>
		</select></p>
		</form> 

		<!-- Détail du formulaire lançant formulaire.php (inscription) -->
	
	<form id="form2" action="formulaire.php" method="POST">
	<p><input type="submit" value="Inscription / Registration"/></p>
	</form>
</html>

