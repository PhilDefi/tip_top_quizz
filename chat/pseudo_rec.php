<?php
	session_start();
	setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);

	// Save member's data in "membre" DB
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=tiptopquizz;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	/*echo $_POST['pseudo'].'<br>';
	echo $_POST['couleur'].'<br>';
	echo $_POST['humeur'].'<br>';*/

	// 2 cas : pseudo déjà connu ds DB "membre" ou pas
	$reponse = $bdd->query('SELECT pseudo, couleur_pseudo, humeur FROM membre');
	$unknown = true;		
	// On va chercher les informations du membre
	while ($donnees = $reponse->fetch())
	{			
		//echo $donnees['pseudo'].' '.$donnees['couleur_pseudo'].' '.$donnees['humeur'].'<br>';
		if ($_POST['pseudo'] == $donnees['pseudo'])
		{				
			// The user is recognized. His profile is updated in "membre" DB
			$unknown = false;
			$req = $bdd->prepare('UPDATE membre SET couleur_pseudo = :nv_couleur_pseudo, humeur = :nv_humeur WHERE pseudo = :pseudo_saisi');
			$req->execute(array(
				'nv_couleur_pseudo' => $_POST['couleur'],
				'nv_humeur' => $_POST['humeur'],
				'pseudo_saisi' => $_POST['pseudo']
				));
		}			
	}
	
	if ($unknown == true)
	{
		//echo '<br><br>Je ne connais pas ce type';
		// The user is not recognized. His profile is added to "membre" DB
		$req = $bdd->prepare('INSERT INTO membre(pseudo, couleur_pseudo, humeur) VALUES(:pseudo_saisi, :couleur_pseudo_saisie, :humeur_saisie)');
			$req->execute(array(
				'pseudo_saisi' => $_POST['pseudo'],
				'couleur_pseudo_saisie' => $_POST['couleur'],
				'humeur_saisie' => $_POST['humeur']
				));		
	}
	
	$reponse->closeCursor();		

	//mémorisation des infos pseudo, couleur et humeur dans var superglobale SESSION
	$_SESSION['pseudo']=$_POST['pseudo'];
	$_SESSION['couleur']=$_POST['couleur'];
	$_SESSION['humeur']=$_POST['humeur'];	
	header('Location: affichage_chat2.php');
	
?>