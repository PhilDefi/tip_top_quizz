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
	
		<br>
		<p class="policemomstype">On y va ??</p>
		<br><br>
						
		<?php
		
		$mot = array ('maison','immeuble','voiture','piscine','cadeau','photographe',
		'bateau','mouchoir','noctambule','psychomotricien','pompier','porcelaine',
		'ordinateur','portable','processeur','printemps','quarantaine','quartz','recette',
		'organiser','chien','mouchoir','sabotage','poisson','dormir','tatouage','traduire',
		'trompette','travailler','chaton','ballon','manger','cahier','papier');
		$max = count ($mot)-1;
		$hasard = rand(0, $max);
		
		$melange = str_shuffle($mot[$hasard]);
		
		echo '<h1 class="policecarbonbig"> '.$melange.' </h1>';
		?>
		
		<div class="box">
			<div class="apparaitre">
				<?php echo '<h1 class="policecarbonbig"> '.$mot[$hasard].' </h1>'; ?>
			</div>
		</div>
		<p class="policemomstype">Passez le curseur dans le cadre pour voir la réponse ...</p>
	
		<br><br><br>		
		<p class="policemomstype">Un autre ??</p>
		<a href="anagramme.php" title="Cliquez pour rejouer"><p class="touche">Anagrammes</p></a>
			
		<br><br><br><br>
		<a href="index.php" title="Retour au menu principal">
		<img class="ombre" src="images/retour.jpg" title="retour au menu principal" alt="Icône Retour Menu"/>
		</a>
				
	</section>
	
</body>

</html>
