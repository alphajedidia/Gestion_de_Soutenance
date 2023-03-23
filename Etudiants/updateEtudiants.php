<?php

// Connexion à la base de données
$pdo = new PDO('mysql:host=nom_hote;dbname=soutenances', 'nom_utilisateur', 'mot_de_passe');

// ID de l'étudiant à mettre à jour
$id_etudiant = 1;

// Nouvelles valeurs pour les champs nom_etudiant et prenom_etudiant
$nouveau_nom_etudiant = 'Dupont';
$nouveau_prenom_etudiant = 'Jean';

// Requête SQL pour mettre à jour les données de l'étudiant avec l'ID donné
$sql = 'UPDATE etudiants SET nom_etudiant = :nom_etudiant, prenom_etudiant = :prenom_etudiant WHERE id_etudiant = :id_etudiant';

// Préparation de la requête
$query = $pdo->prepare($sql);

// Liaison des valeurs aux paramètres de la requête
$query->bindParam(':nom_etudiant', $nouveau_nom_etudiant);
$query->bindParam(':prenom_etudiant', $nouveau_prenom_etudiant);
$query->bindParam(':id_etudiant', $id_etudiant);

// Exécution de la requête
$query->execute();


/*
    Dans cet exemple, la méthode bindParam est utilisée pour lier les valeurs aux paramètres de la requête. La requête SQL met à jour les champs nom_etudiant et prenom_etudiant pour l'étudiant ayant l'ID donné. Il est important de noter que le paramètre id_etudiant doit correspondre à la clé primaire de la table, qui dans cet exemple est une colonne nommée id_etudiant.
*/
?>
