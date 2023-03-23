<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Etudiant</title>
</head>
<body>


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
/* Class etudiant */
class Etudiant {
    private $matricule;
    private $nom;
    private $prenom;
    private $niveau;
    private $parcours;
    private $adr_email;
    
    public function __construct($matricule, $nom, $prenom, $niveau, $parcours, $adr_email) {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->niveau = $niveau;
        $this->parcours = $parcours;
        $this->adr_email = $adr_email;
    }
    public function getMatricule() {
        return $this->matricule;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    
    public function getNiveau() {
        return $this->niveau;
    }
    
    public function getParcours() {
        return $this->parcours;
    }
    
    public function getAdrEmail() {
        return $this->adr_email;
    }
}
    ?>
    <h1>Ajouter un étudiant</h1>
    <form action="formulaire_etudiant.php" method="post">
		<label for="matricule">Matricule :</label>
		<input type="text" id="matricule" name="matricule" required><br><br>
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" required><br><br>
		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" required><br><br>
		<label for="niveau">Niveau :</label>
		<input type="text" id="niveau" name="niveau" required><br><br>
		<label for="parcours">Parcours :</label>
		<input type="text" id="parcours" name="parcours" required><br><br>
		<label for="adr_email">Adresse e-mail :</label>
		<input type="email" id="adr_email" name="adr_email" required><br><br>
		<input type="submit" value="Ajouter">
        <script>

        </script>
	</form>
<?php
/* Récupération des données du formulaire */
$etudiant = new Etudiant($_POST['matricule'],$_POST['nom'],$_POST['prenom'],$_POST['niveau'],$_POST['parcours'],$_POST['adr_email']);

/* Préparation et exécution de la requête d'insertion */
$insertion = $bdd->prepare("INSERT INTO etudiants (matricule, nom_etudiant, prenom_etudiant, niveau, parcours, adr_email) VALUES (?, ?, ?, ?, ?, ?)");
try{
    $insertion->execute(array($etudiant->getMatricule(), $etudiant->getNom(), $etudiant->getPrenom(), $etudiant->getNiveau(), $etudiant->getParcours(), $etudiant->getAdrEmail()));
    echo "enter with success";
}
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}
$bdd=null;
?>
    
</body>
</html>