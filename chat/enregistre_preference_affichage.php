<?php
session_start();

$_SESSION['choix_affichage'] = $_POST['nombre_message'];
header('Location: affichage_chat2.php');
?>