<?php
class Professeur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function updateProfesseur($id_prof, $nom_prof, $prenom_prof, $civilite, $grade) {
        $sql = "UPDATE professeurs SET nom_prof = :nom_prof, prenom_prof = :prenom_prof, civilite = :civilite, grade = :grade WHERE id_prof = :id_prof";
        
        // Préparation de la requête
        $stmt = $this->pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':id_prof', $id_prof, PDO::PARAM_STR);
        $stmt->bindParam(':nom_prof', $nom_prof, PDO::PARAM_STR);
        $stmt->bindParam(':prenom_prof', $prenom_prof, PDO::PARAM_STR);
        $stmt->bindParam(':civilite', $civilite, PDO::PARAM_STR);
        $stmt->bindParam(':grade', $grade, PDO::PARAM_STR);

        // Exécution de la requête
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

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

// Instance de la classe Professeur
$professeur = new Professeur($pdo);

// Exemple de mise à jour d'un professeur
$id_prof = '1';
$nom_prof = 'DUPONT';
$prenom_prof = 'Jacques';
$civilite = 'M';
$grade = 'Professeur associé';

if ($professeur->updateProfesseur($id_prof, $nom_prof, $prenom_prof, $civilite, $grade)) {
    echo "Le professeur a été mis à jour avec succès.";
} else {
    echo "Une erreur est survenue lors de la mise à jour du professeur.";
}

/* Notez que vous devrez adapter les informations de connexion à votre propre base de données et que vous pouvez personnaliser la méthode updateProfesseur() pour qu'elle corresponde à vos besoins. */
?>
