<?php

$host = 'localhost';
$dbname = 'soutenances';
$user = 'root';
$password = '';
/* Connexion à la base de données avec PDO */
try {
	$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected with the database ". $dbname ;
    } 
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
    }
?>