<?php

// Connexion à la base de données
$pdo = new PDO('mysql:host=nom_hote;dbname=soutenances', 'nom_utilisateur', 'mot_de_passe');

// ID de l'étudiant à supprimer
$id_etudiant = 1;

// Requête SQL pour supprimer l'étudiant avec l'ID donné
$sql = 'DELETE FROM etudiants WHERE id_etudiant = :id_etudiant';

// Préparation de la requête
$query = $pdo->prepare($sql);

// Liaison des valeurs aux paramètres de la requête
$query->bindParam(':id_etudiant', $id_etudiant);

// Exécution de la requête
$query->execute();
 

/* Dans cet exemple, la méthode bindParam est utilisée pour lier la valeur de l'ID de l'étudiant à supprimer au paramètre de la requête :id_etudiant. La requête SQL supprime l'enregistrement de la table etudiants correspondant à l'ID donné. Il est important de noter que le paramètre id_etudiant doit correspondre à la clé primaire de la table, qui dans cet exemple est une colonne nommée id_etudiant. */
?>
