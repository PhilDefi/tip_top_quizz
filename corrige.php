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
		<p>Alors çà donne quoi ??</p>
		<br><br>	
		
		<p>Vous avez répondu :</p>
		
		<?php
				
		$reponse = array ($_POST['q1'] ,$_POST['q2'],$_POST['q3'],$_POST['q4'],$_POST['q5']);
		
		for ($i = 0 ; $i < 5 ; $i++)
		{			
			echo 'Question '.($i+1).' : ';
			if ($reponse[$i] == 1)
			{
				echo '<b style="color: green">JUSTE</b><br>';
			}
			else
			{
				echo '<b style="color: red">FAUX</b><br>';
			}
		}				
		
		$note = $_POST['q1']+$_POST['q2']+$_POST['q3']+$_POST['q4']+$_POST['q5'];
						
		echo '<br><br>Vous obtenez la note de <b>'.$note.'/5</b><br>';
		
		if ($note == 5)
		{
			echo '<b>BRAVO, c\'est parfait !</b>';
		}
		elseif ($note <3)
		{
			echo '<b>OUH LA LA, il faut revoir tout çà !</b>';
		}
		else
		{
			echo '<b>OUAIP, c\'est pas trop mal, mais doit mieux faire !</b>';
		}
		
		?>
		
		<br><br><br><br>
		<a href="index.php" title="Retour au menu principal">
		<img class="ombre" src="images/retour.jpg" title="retour au menu principal" alt="Icône Retour Menu"/>
		</a>
		
				
	</section>
	
</body>

</html>
