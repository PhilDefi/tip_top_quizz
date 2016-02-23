<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>titre du site</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- définition d'une icône -->
	<link rel="shortcut icon" href="images/icone_interrogation.ico" type="image/x-icon"/>
	<link rel="icon" href="images/icone_interrogation.ico" type="image/x-icon"/>
</head>

<body>

	<?php include("entete.php"); ?>

	<section>
			
		<?php
		
		$intitule_q1 = "Quelle est la plus grosse planète du système solaire ?";
		$reponse_q1 = array ('Saturne', 'Uranus', 'Jupiter', 'Neptune');
				
		$intitule_q2 = "De quoi sont composés les anneaux de Saturne ?";
		$reponse_q2 = array ('de poussière et de glace', 'd\'oxygène', 'de vapeur d\'eau', 'de météorites');
		
		$intitule_q3 = "La gravité sur la lune est-elle ?";
		$reponse_q3 = array ('comme sur le Terre', '6 fois moindre que sur la terre', '6 fois supérieure que sur la Terre', 'il n\'y a pas de gravtié sur la Lune');
		
		$intitule_q4 = "Un satellite géostationnaire est ?";
		$reponse_q4 = array ('au dessus du pôle Nord', 'autour de la Lune', 'autour du Soleil', 'fixe par rapport à la Terre');
		
		$intitule_q5 = "A quelle altitude se trouve la stratosphère ?";
		$reponse_q5 = array ('entre 0 et 1 km', 'entre 1 et 5 km', 'entre 5 et 10 km', 'entre 10 et 20 km');
		
		?>
	
		<br>
		<p class="policemomstype">On y va ??</p>
		<br><br>
				
		<form action="corrige.php" method="post">

			<P class="align_gauche"><b><?php echo $intitule_q1 ?></b></p>
			<div class="proposition">				
				<input type="radio" name="q1" value="0" id="qu11" required />
				<label for="qu11"><?php echo $reponse_q1[0] ?></label><br>				
				<input type="radio" name="q1" value="0" id="qu12" required />
				<label for="qu12"><?php echo $reponse_q1[1] ?></label><br>
				<input type="radio" name="q1" value="1" id="qu13" required />
				<label for="qu13"><?php echo $reponse_q1[2] ?></label><br>
				<input type="radio" name="q1" value="0" id="qu14" required />
				<label for="qu14"><?php echo $reponse_q1[3] ?></label><br>
			</div>
			<br><br>
					
			<P class="align_gauche"><b><?php echo $intitule_q2 ?></b></p>
			<div class="proposition">				
				<input type="radio" name="q2" value="1" id="qu21" required />
				<label for="qu21"><?php echo $reponse_q2[0] ?></label><br>				
				<input type="radio" name="q2" value="0" id="qu22" required />
				<label for="qu22"><?php echo $reponse_q2[1] ?></label><br>
				<input type="radio" name="q2" value="0" id="qu23" required />
				<label for="qu23"><?php echo $reponse_q2[2] ?></label><br>
				<input type="radio" name="q2" value="0" id="qu24" required />
				<label for="qu24"><?php echo $reponse_q2[3] ?></label><br>
			</div>
			<br><br>
			
			<P class="align_gauche"><b><?php echo $intitule_q3 ?></b></p>
			<div class="proposition">	
				<input type="radio" name="q3" value="0" id="qu31" required />
				<label for="qu31"><?php echo $reponse_q3[0] ?></label><br>
				<input type="radio" name="q3" value="1" id="qu32" required />
				<label for="qu32"><?php echo $reponse_q3[1] ?></label><br>
				<input type="radio" name="q3" value="0" id="qu33" required />
				<label for="qu33"><?php echo $reponse_q3[2] ?></label><br>
				<input type="radio" name="q3" value="0" id="qu34" required />
				<label for="qu34"><?php echo $reponse_q3[3] ?></label><br>
			</div>
			<br><br>
			
			<P class="align_gauche"><b><?php echo $intitule_q4 ?></b></p>
			<div class="proposition">	
				<input type="radio" name="q4" value="0" id="qu41" required />
				<label for="qu41"><?php echo $reponse_q4[0] ?></label><br>
				<input type="radio" name="q4" value="0" id="qu42" required />
				<label for="qu42"><?php echo $reponse_q4[1] ?></label><br>
				<input type="radio" name="q4" value="0" id="qu43" required />
				<label for="qu43"><?php echo $reponse_q4[2] ?></label><br>
				<input type="radio" name="q4" value="1" id="qu44" required />
				<label for="qu44"><?php echo $reponse_q4[3] ?></label><br>
			</div>
			<br><br>
			
			<P class="align_gauche"><b><?php echo $intitule_q5 ?></b></p>
			<div class="proposition">	
				<input type="radio" name="q5" value="0" id="qu51" required />
				<label for="qu51"><?php echo $reponse_q5[0] ?></label><br>
				<input type="radio" name="q5" value="0" id="qu52" required />
				<label for="qu52"><?php echo $reponse_q5[1] ?></label><br>
				<input type="radio" name="q5" value="0" id="qu53" required />
				<label for="qu53"><?php echo $reponse_q5[2] ?></label><br>
				<input type="radio" name="q5" value="1" id="qu54" required />
				<label for="qu54"><?php echo $reponse_q5[3] ?></label><br>
			</div>
			<br><br><br>
			
			 <input class="bouton_valider" type="submit" value="Valider mes réponses" />
					
		</form>
	
	</section>
	
</body>

</html>
