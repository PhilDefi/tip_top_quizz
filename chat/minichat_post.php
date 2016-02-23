<?php
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=tiptopquizz;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}	

$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_message) VALUES (:pseudo, :message, NOW())');
$req->execute(array(
	'pseudo' => $_SESSION['pseudo'],
	'message' => htmlspecialchars($_POST['texte'])
));

/* Efface les messages vieux de plus d'une semaine */
$bdd->exec('DELETE FROM minichat WHERE DATE_ADD(date_message, INTERVAL 15 DAY) < NOW()');

header('Location: affichage_chat2.php');
?>