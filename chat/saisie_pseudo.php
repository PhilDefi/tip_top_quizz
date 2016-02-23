<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>mini chat - pseudo</title>
	<link rel="stylesheet" type="text/css" href="../style.css" charset="utf-8">
	<!-- définition d'une icône -->
	<link rel="shortcut icon" href="../images/icone_interrogation.ico" type="image/x-icon"/>
	<link rel="icon" href="../images/icone_interrogation.ico" type="image/x-icon"/>
</head>

<body>

	<?php include("../entete.php"); ?>

	<section class="chat_section_style">
	
		<?php
				
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=tiptopquizz;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
			// Si un cookie est actif, on va chercher sa couleur et son humeur ds DB "membre"
			if (isset($_COOKIE['pseudo']))
			{
				$reponse = $bdd->query('SELECT pseudo, couleur_pseudo, humeur FROM membre');
				
				// On va chercher les information du membre
				while ($donnees = $reponse->fetch())
				{
					if ($_COOKIE['pseudo'] == $donnees['pseudo'])
					{
						//echo $donnees['pseudo'].' '.$donnees['couleur_pseudo'].' '.$donnees['humeur'];
						$pseudo=$_COOKIE['pseudo'];
						$couleur=$donnees['couleur_pseudo'];
						$humeur=$donnees['humeur'];						
						//echo $couleur.' '.$humeur;				
					}
				}
				$reponse->closeCursor();		
			}		
		?>	
	
		<br>		
		<div class="chat_login_style">
			<br>
			
			<?php
			// Salutation si le membre est connu
				if (isset($_COOKIE['pseudo']))
				{
					echo 'Bonjour '.'<b style="color: '.$couleur.'">'.$pseudo.'</b>';
					
					switch ($humeur)
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
					echo '<br><br><br>';				
				}
			?>
			
			<form action="pseudo_rec.php" method="post">
				<label for="idpseudo">Entrez votre pseudo pour le chat </label>
				<input type="texte" name="pseudo" id="idpseudo" <?php if (isset($_COOKIE['pseudo'])) { echo 'value="'.$_COOKIE['pseudo'].'"';} ?> required />
				<br><br><br>
				
				<b>Votre couleur</b>
				<br><br>			
				<input type="radio" name="couleur" value="red" id="couleur1" <?php if (isset($_COOKIE['pseudo'])) { if ($couleur=="red") {echo 'checked';}} ?> required>
				<label for="couleur1" >rouge </label>
				<img src="../images/rouge.png"/>
				
				<input type="radio" name="couleur" value="blue" id="couleur2" <?php if (isset($_COOKIE['pseudo'])) { if ($couleur=="blue") {echo 'checked';}} ?> required>
				<label for="couleur2" >bleu </label>
				<img src="../images/bleu.png"/>
				
				<input type="radio" name="couleur" value="green" id="couleur3" <?php if (isset($_COOKIE['pseudo'])) { if ($couleur=="green") {echo 'checked';}} ?> required>
				<label for="couleur3" >vert </label>
				<img src="../images/vert.png"/>
				
				<input type="radio" name="couleur" value="orange" id="couleur4" <?php if (isset($_COOKIE['pseudo'])) { if ($couleur=="orange") {echo 'checked';}} ?> required>
				<label for="couleur4" >orange </label>
				<img src="../images/orange.png"/>
				<br><br><br>
				
				<b>Votre humeur</b>
				<br>				
				<input type="radio" name="humeur" value="dormeur" id="humeur1" <?php if (isset($_COOKIE['pseudo'])) { if ($humeur=="dormeur") {echo 'checked';}} ?> required>
				<label for="humeur1" >dormeur</label>
				<img src="../images/dormeur.png"/>
				
				<input type="radio" name="humeur" value="prof" id="humeur2" <?php if (isset($_COOKIE['pseudo'])) { if ($humeur=="prof") {echo 'checked';}} ?> required>
				<label for="humeur2" >prof</label>
				<img src="../images/prof.png"/>
				
				<input type="radio" name="humeur" value="grognon" id="humeur3" <?php if (isset($_COOKIE['pseudo'])) { if ($humeur=="grognon") {echo 'checked';}} ?> required>
				<label for="humeur3" >grognon</label>
				<img src="../images/grognon.png"/>
				
				<input type="radio" name="humeur" value="joyeux" id="humeur4" <?php if (isset($_COOKIE['pseudo'])) { if ($humeur=="joyeux") {echo 'checked';}} ?> required>
				<label for="humeur4" >joyeux</label>
				<img src="../images/joyeux.png"/>
				<br><br>
				
				<input type="submit" value="Envoyer">
				
			</form>
			<br>			
		</div>		
		<br>			
		
	</section>	
</body>

</html>