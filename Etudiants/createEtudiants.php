<?php class Etudiant {
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

// Connexion à la base de données
$dsn = 'mysql:host=your_host;dbname=soutenances';
$username = 'your_username';
$password = 'your_password';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Requête SQL pour la création de la table "etudiants"
$sql = "CREATE TABLE `soutenances`.`etudiants` (
            `matricule` VARCHAR(10) NOT NULL ,
            `nom_etudiant` VARCHAR(50) NOT NULL ,
            `prenom_etudiant` VARCHAR(50) NOT NULL ,
            `niveau` VARCHAR(10) NOT NULL ,
            `parcours` VARCHAR(5) NOT NULL ,
            `adr_email` VARCHAR(50) NOT NULL ,
            PRIMARY KEY (`matricule`(10))
        ) ENGINE = InnoDB;";

// Exécution de la requête préparée
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>