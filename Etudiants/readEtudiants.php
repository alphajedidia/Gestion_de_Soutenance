<?php

// Connexion à la base de données
$pdo = new PDO('mysql:host=nom_hote;dbname=soutenances', 'nom_utilisateur', 'mot_de_passe');

// Requête SQL pour récupérer les données de la table etudiants
$sql = 'SELECT * FROM etudiants';

// Préparation de la requête
$query = $pdo->prepare($sql);

// Exécution de la requête
$query->execute();

// Récupération des résultats
$etudiants = $query->fetchAll(PDO::FETCH_CLASS, 'Etudiant');

// Affichage des résultats
foreach ($etudiants as $etudiant) {
    echo $etudiant->getNomEtudiant() . ' ' . $etudiant->getPrenomEtudiant() . '<br>';
}



/* Dans cet exemple, la méthode fetchAll est utilisée pour récupérer tous les résultats sous forme d'un tableau d'objets de la classe Etudiant. Chaque objet représente une ligne de la table etudiants. Ensuite, les propriétés de chaque objet peuvent être utilisées pour afficher les données correspondantes. */
?>
