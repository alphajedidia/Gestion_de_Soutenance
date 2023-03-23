<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "soutenances";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    echo $e->getMessage();
}

// Requête SQL pour récupérer les données des professeurs
$sql = "SELECT * FROM professeurs";

// Préparation de la requête
$stmt = $pdo->prepare($sql);

// Exécution de la requête
$stmt->execute();

// Récupération des résultats
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des données
foreach ($results as $row) {
    echo "ID: " . $row['id_prof'] . "<br>";
    echo "Nom: " . $row['nom_prof'] . "<br>";
    echo "Prénom: " . $row['prenom_prof'] . "<br>";
    echo "Civilité: " . $row['civilite'] . "<br>";
    echo "Grade: " . $row['grade'] . "<br>";
    echo "<br>";
}


/* Notez que vous devrez adapter les informations de connexion à votre propre base de données et que vous pouvez personnaliser l'affichage des données pour qu'il corresponde à vos besoins. */
?>
