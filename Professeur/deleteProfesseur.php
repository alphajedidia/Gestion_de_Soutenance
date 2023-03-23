<?php

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=soutenances', 'username', 'password');

// Récupération de l'id du professeur à supprimer
$id_prof = $_GET['id'];

// Préparation de la requête SQL
$query = "DELETE FROM professeurs WHERE id_prof = :id_prof";
$stmt = $pdo->prepare($query);

// Association de la valeur de l'id_prof à la variable préparée :id_prof
$stmt->bindParam(':id_prof', $id_prof);

// Exécution de la requête
if ($stmt->execute()) {
    echo "Le professeur a été supprimé avec succès.";
} else {
    echo "Une erreur s'est produite lors de la suppression du professeur.";
}

/* Remarque : comme pour les autres exemples, il est important de sécuriser le code en s'assurant que l'utilisateur a le droit de supprimer un professeur et en gérant les erreurs de manière appropriée. */

?>
