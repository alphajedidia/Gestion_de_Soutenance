<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'soutenances';
$user = 'utilisateur';
$password = 'motdepasse';
$connexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

// Requête SQL préparée pour récupérer tous les étudiants
$sql = "SELECT * FROM etudiants";
$requete = $connexion->prepare($sql);

// Exécution de la requête
$requete->execute();

// Récupération des résultats dans un tableau associatif
$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
foreach ($resultats as $etudiant) {
    echo "Matricule : " . $etudiant['matricule'] . "<br>";
    echo "Nom : " . $etudiant['nom_etudiant'] . "<br>";
    echo "Prénom : " . $etudiant['prenom_etudiant'] . "<br>";
    echo "Niveau : " . $etudiant['niveau'] . "<br>";
    echo "Parcours : " . $etudiant['parcours'] . "<br>";
    echo "Adresse e-mail : " . $etudiant['adr_email'] . "<br><br>";
}

// Fermeture de la connexion
$connexion = null;
?>