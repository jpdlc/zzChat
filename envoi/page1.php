<?php
/*Fichier page1.php
 * gère la page principale (salon de discussion)
 */
 
session_start();

//gère l'affichage en fonction de la langue choisie
function to_lang($string, $lang)
{
	$result = "";
	
	switch($string) {
		case 'Bonjour':
			if ($lang=="Francais") return "Bonjour $nom, vous êtes connectés" ; return "Hello $nom, you are now online";
			break;
		case 'Utilisateurs':
			if ($lang=="Francais") return "Utilisateurs connectés" ; return "Online users";
			break;
		case 'Envoi':
			if ($lang=="Francais") return "Envoyer" ; return "Send";
			break;
		case 'Deconnexion':
			if ($lang=="Francais") return "Déconnexion" ; return "Disconnect";
			break;
		case 'Gras':
			if ($lang =="Francais") return "Gras" ; return "Bold" ;
			break;
		case 'Italique':
			if ($lang =="Francais") return "Italique" ; return "Italics" ;
			break;
		case 'Souligné':
			if ($lang =="Francais") return "Souligné" ; return "Underlined" ;
			break;
		case 'Couleur':
			if ($lang =="Francais") return "Couleur" ; return "Color" ;
			break;
	}
}

//vérification de connexion
if (isset($_SESSION['nom']))
{
	$nom = $_SESSION['nom'];
	echo '<p>'.to_lang('Bonjour', $_SESSION['lang']).'</p>';

}
else
{
	header ("Refresh: 0;URL=index1.php");
}
?>
<html>
	<head>

			<title>Tchat ajax</title>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
			<script src="main.js"></script>		
			<script>
			


			function charger()
			{
				
				setTimeout( function(){
					
					// on lance une requête AJAX
					$.ajax({
						url : "charger.php",
						type : 'POST',
						success : function(html)
						{
							// on veut ajouter les nouveaux messages au 
							// début du bloc #messages
							$('#divMessages').html(html);
						},
						error : function(html, statut, error)
						{
							//alert("Erreur de transmission ");
						}
					});
					
					
					charger();
					var objDiv = document.getElementById("divMessages");
					objDiv.scrollTop = objDiv.scrollHeight;

				}, 100); // on exécute le chargement toutes les 0.1 secondes
				
			}
			
			function chargerUsers()
			{
				
				setTimeout( function(){
					
					// on lance une requête AJAX
					
					$.ajax({
						url : "chargerUsers.php",
						type : 'POST',
						success : function(html)
						{
							//alert('ok');
							// on veut ajouter les nouveaux messages au 
							// début du bloc #messages
							$('#divUsers').html(html);
						},
						error : function(html, statut, error)
						{
							
						}
					});
					
					
					chargerUsers();


				}, 100); // on exécute le chargement toutes les 0.1 secondes
				
			}
			
			function onClickEnvoi()
			{
				
				$('#envoi').click(function(e)
				{
					//alert("coyuc2");
					e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
					
					var message = $('#message').val();

					if(message != "") // on vérifie que les variables ne sont pas vides
					{
						$.ajax(
						{
							url : "traitement.php", // on donne l'URL du fichier de traitement
							type : 'POST', // la requête est de type POST
							data : "message=" + message, // et on envoie nos données
							success : function()
							{
								$('#message').val("");
							}
						});

					}
				});
			
			}
			
			// écrire un message en gras
			function Gras()
			{
				
				$('#button').click(function()
				{
					//alert("coyuc2");
					//e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
					var message = $('#message').val();
					
					
					
					if(message != "") // on vérifie que les variables ne sont pas vides
					{				
						$('#message').val("<b>"+$('#message').val()+"</b>")
					
						//$('#message').val().append('</h2>');
						//alert('yopou');
						//alert($('#message').val());
					}
				});
			
			}
			
			//écrire un message en italique
			function Italique()
			{
				
				$('#buttonI').click(function()
				{
					//alert("coyuc2");
					//e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
					var message = $('#message').val();
					
					
					
					if(message != "") // on vérifie que les variables ne sont pas vides
					{				
						$('#message').val("<j>"+$('#message').val()+"</j>")
						
						//$('#message').val().append('</h2>');
						//alert('yopou');
						//alert($('#message').val());
					}
				});
			
			}
			
			//souligner son message
			function Souligner()
			{
				
				$('#buttonS').click(function()
				{
					//alert("coyuc2");
					//e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
					var message = $('#message').val();
					
					
					
					if(message != "") // on vérifie que les variables ne sont pas vides
					{				
						$('#message').val("<i>"+$('#message').val()+"</i>")
					
						//$('#message').val().append('</h2>');
						//alert('yopou');
						//alert($('#message').val());
					}
				});
			
			}
			
			//changer la couleur de son message
			function Couleur()
			{
				
				$('#buttonC').click(function()
				{
					//alert("coyuc2");
					//e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
					var message = $('#message').val();
					
					
					
					if(message != "") // on vérifie que les variables ne sont pas vides
					{				
						$('#message').val("<k>"+$('#message').val()+"</k>")
					
						//$('#message').val().append('</h2>');
						//alert('yopou');
						//alert($('#message').val());
					}
				});
			
			}
			
			// la scrollbarre reste en bas
			function stayDown()
			{
				var objDiv = document.getElementById("divMessages");
				objDiv.scrollTop = objDiv.scrollHeight;
				
			}


		$(document).ready(Couleur);
		$(document).ready(Souligner);
		$(document).ready(Gras);
		$(document).ready(Italique);
		$(document).ready(stayDown);
		$(document).ready(charger);
		$(document).ready(chargerUsers);
		$(document).ready(onClickEnvoi);
			
			</script>	
	</head>
	
	
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="accueil.css"/>

	<body>
	<?php
	$messages = array();
	$nomfichier = fopen('contenu.txt', 'r');
	
	//écriture en fin des messages
	while(!feof($nomfichier))
	{
		
		array_push($messages,fgets($nomfichier));
		
	}
	fclose($nomfichier);
	echo "<div id='divMessages'>";
	foreach ($messages as $message)
	{
		echo $message;
		echo "</br>";
	}
	echo "</div>";
	//le point sert a concatener des elements entre eux. On le fait sinon il traduit pas

	
	?>
	<?php
	echo '<p>'.to_lang('Utilisateurs', $_SESSION['lang']).'</p>';

	$users = array();
	$nomfichier = fopen('connectes.txt', 'r');
	while(!feof($nomfichier))
	{
		
		array_push($users,fgets($nomfichier));
		
	}
	fclose($nomfichier);
	echo "<div id='divUsers'>";
	foreach ($users as $user)
	{
		echo $user;
		echo "</br>";
	}
	echo "</div>";
	//le point sert a concatener des elements entre eux. On le fait sinon il traduit pas

	
	?>
<p>
	
			<!-- Description de la page -->
	
	<form method="POST">
	    <?php echo "Message" ?><br/><textarea name="message" id="message"></textarea><br/>

	</div>
	<div id='divButton'>
	<input type="button" value=<?php echo to_lang('Gras', $_SESSION['lang']) ?> id="button"/>
	</div>
	
	<div id='divButton'>
	<input type="button" value=<?php echo to_lang('Italique', $_SESSION['lang']) ?> id="buttonI"/>
	</div>
	
	<div id='divButton'>
	<input type="button" value=<?php echo to_lang('Souligné', $_SESSION['lang']) ?> id="buttonS"/>
	</div>
	
	<div id='divButton'>
	<input type="button" value=<?php echo to_lang('Couleur', $_SESSION['lang']) ?> id="buttonC"/>
	</div>
</p>
	
	    <button name="submit" id="envoi"><?php echo to_lang('Envoi', $_SESSION['lang']) ?></button>
	</form>
	<form action="deconnexion.php" method="post">
	<input type="hidden" name="login" value="<?php echo $_SESSION['nom']; ?>">
	<?php echo '<p><input type="submit" value="'.to_lang('Deconnexion', $_SESSION['lang']).'" /></p>'; ?>
	</form>
	</body>

</html>
>
