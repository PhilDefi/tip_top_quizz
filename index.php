<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="description" content="Site de jeux, quizz et anagrammes">
	<meta name="keyword" content="jeu, jeu internet, quizz, questions, anagramme, jouer">
	<title>Tip Top Quizz</title>
	<link rel="stylesheet" type="text/css" href="style.css" charset="utf-8">
	<!-- définition d'une icône -->
	<link rel="shortcut icon" href="images/icone_interrogation.ico" type="image/x-icon"/>
	<link rel="icon" href="images/icone_interrogation.ico" type="image/x-icon"/>
</head>

<body>

	<?php include("entete.php"); ?>
	
	<section>
	
		<br>
		<p class="policemomstype">Choisissez votre Quizz ...</p>
		<a href="geo.php" title="Testez vos connaissances en géographie">
		<p class="touche">Géographie</p></a>
		
		<a href="science.php" title="Testez vos connaissances en sciences">
		<p class="touche">Sciences</p></a>
		
		<a href="sport.php" title="Testez vos connaissances en sport">
		<p class="touche">Sport</p></a>
		
		<br><br><br>
		<p class="policemomstype">Remuez vos méninges avec nos anagrammes ...</p>
		<a href="anagramme.php" title="Jouez aux anagrammes">
		<p class="touche">Anagrammes</p></a>
		
		<br><br><br>
		<p class="policemomstype">Rejoingnez notre chatroom ...</p>
		<a href="chat/saisie_pseudo.php" title="Chat">
		<p class="touche">Chat</p></a>
				
	</section>
	
</body>

</html>
