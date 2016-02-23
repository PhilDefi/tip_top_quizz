<?php
session_start();
if (isset($_SESSION['choix_affichage']))
{
	$nombre_message_a_afficher = $_SESSION['choix_affichage'];
}
else
{
	$nombre_message_a_afficher = 10;
}
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>mini chat</title>
	<link rel="stylesheet" type="text/css" href="../style.css" charset="utf-8">
	<!-- définition d'une icône -->
	<link rel="shortcut icon" href="../images/icone_interrogation.ico" type="image/x-icon"/>
	<link rel="icon" href="../images/icone_interrogation.ico" type="image/x-icon"/>
</head>

<body>
	<?php include("../entete.php"); 	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=tiptopquizz;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}			
	?>
	<br>		
	
	<!-- **********  FENETRE A GAUCHE PRESENTANT LES DERNIERS MEMBRES CONNECTES  ********** -->		
	<aside class="aside_chat">
		<p><b>Derniers membres connectés</b></p>
		<br>
		
		<?php
		$reponse = $bdd->query('SELECT pseudo FROM minichat GROUP BY pseudo ORDER BY date_message DESC LIMIT 0,5');
						
		while ($donnees_minichat = $reponse->fetch())
		{
			// il faudra exclure son propre pseudo
			
/*			?>
			<div class="affichage_chat_membre_connecte">
			<?php
*/			
			
			
			// On va chercher la couleur du membre
			$reponse2 = $bdd->query('SELECT pseudo, couleur_pseudo, humeur FROM membre');
			while ($donnees_membre = $reponse2->fetch())
			{			
			if ($donnees_membre['pseudo'] == $donnees_minichat['pseudo'])
				{				
				echo '<b style="color: '.$donnees_membre['couleur_pseudo'].'">'.$donnees_membre['pseudo'].'</b><br>';				
				?>
				<div class="affichage_chat_membre_connecte" style="background-color: <?php echo $donnees_membre['couleur_pseudo'] ?>;">
				<?php
						
				switch ($donnees_membre['humeur'])
					{
					case "dormeur":
						?>
						<img src="../images/dormeur.png"/><br><br>
						<?php
						break;
						
					case "prof":
						?>
						<img src="../images/prof.png"/><br><br>
						<?php
						break;
						
					case "grognon":
						?>
						<img src="../images/grognon.png"/><br><br>
						<?php
						break;
					
					case "joyeux":
						?>
						<img src="../images/joyeux.png"/><br><br>
						<?php
						break;
					}
				}
			}
			?>
			</div>
			<?php
		}
		$reponse->closeCursor();
		?>		
	</aside>	
	
	<section class="chat_section_style">
	
		<!-- **********  PREMIERE FENETRE DU CHAT  ********** -->		
		<div class="chat_window">
			<?php		
			echo 'Bonjour '.'<b style="color: '.$_SESSION['couleur'].'">'.$_SESSION['pseudo'].'</b>';
					
			switch ($_SESSION['humeur'])
			{
				case "dormeur":
					?>
					<img src="../images/dormeur.png"/>
					<?php
					break;
					
				case "prof":
					?>
					<img src="../images/prof.png"/>
					<?php
					break;
					
				case "grognon":
					?>
					<img src="../images/grognon.png"/>
					<?php
					break;
				
				case "joyeux":
					?>
					<img src="../images/joyeux.png"/>
					<?php
					break;
			}
			?>
		
			<br><br>			
			<!-- Saisie du texte -->
			<form action="minichat_post.php" method="post">
				<textarea name="texte" id="idtexte" cols ="40" rows="3" placeholder="Entrez votre message" required></textarea>
				<br><br>
				<input type="submit" value="Envoyer">
			</form>
			<br><br>
			
			<!-- Option d'affichage et Rafraîchir la page -->
			<!-- On envoie le choix du nb de msg affichés ds variable nombre_message -->
			<form action="enregistre_preference_affichage.php" method="post">
				Nombre de messages affichés : 
				
				<input type="radio" name="nombre_message" value="10" <?php if ($nombre_message_a_afficher == 10) {echo 'checked';} ?> id="idnbmsg" required />
				<label for="idpseudo"> 10 &nbsp;&nbsp;</label>
				
				<input type="radio" name="nombre_message" value="20" <?php if ($nombre_message_a_afficher == 20) {echo 'checked';} ?> id="idnbmsg" required />
				<label for="idpseudo">20 &nbsp;&nbsp;</label>
				
				<input type="radio" name="nombre_message" value="30" <?php if ($nombre_message_a_afficher == 30) {echo 'checked';} ?> id="idnbmsg" required />
				<label for="idpseudo"> 30</label><br><br>
				<input type="submit" value="Rafraîchir">
			</form>		
			<br>			
		</div>
		<br>
		
		<!-- **********  DEUXIEME FENETRE DU CHAT  ********** -->
		<div class="chat_window">		
			<?php			
			
				
			/* lecture de la DB */
			$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%d/%m/%Y à %Hh%imin%ss\') AS date_reformatee FROM minichat ORDER by id DESC limit 0,'.$nombre_message_a_afficher.'');
						
			while ($donnees = $reponse->fetch())
			{
				echo '<br><i style="color: grey; font-size: 10pt">le '.$donnees['date_reformatee'].'</i>';		
				echo '<br><b><i><u>'.htmlspecialchars($donnees['pseudo']).'</u></i> - '.htmlspecialchars($donnees['message']).'</b><br>';
			}
			$reponse->closeCursor();
			
			/* on affiche des points de suspension en bas du chat */
			echo '<br> ... ';					
			?>					
		
		</div>		
		
		<br><br>
		<a href="../index.php" title="Retour au menu principal">
		<img class="ombre" src="../images/retour.jpg" title="retour au menu principal" alt="Icône Retour Menu"/>
		</a>	

	</section>
	
	
</body>

</html>