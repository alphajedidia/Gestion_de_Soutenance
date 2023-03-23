<?php

class Professeur {
    public $id_prof;
    public $nom_prof;
    public $prenom_prof;
    public $civilite;
    public $grade;

    public function __construct($id_prof, $nom_prof, $prenom_prof, $civilite, $grade) {
        $this->id_prof = $id_prof;
        $this->nom_prof = $nom_prof;
        $this->prenom_prof = $prenom_prof;
        $this->civilite = $civilite;
        $this->grade = $grade;
    }
}

// Connexion à la base de données
$pdo = new PDO('mysql:host=nom_hote;dbname=soutenances', 'nom_utilisateur', 'mot_de_passe');

// Nouveau professeur à insérer
$professeur = new Professeur('PR001', 'Dupont', 'Jean', 'M.', 'Professeur des universités');

// Requête SQL pour insérer un nouveau professeur
$sql = 'INSERT INTO professeurs (id_prof, nom_prof, prenom_prof, civilite, grade) VALUES (:id_prof, :nom_prof, :prenom_prof, :civilite, :grade)';

// Préparation de la requête
$query = $pdo->prepare($sql);

// Liaison des valeurs aux paramètres de la requête
$query->bindParam(':id_prof', $professeur->id_prof);
$query->bindParam(':nom_prof', $professeur->nom_prof);
$query->bindParam(':prenom_prof', $professeur->prenom_prof);
$query->bindParam(':civilite', $professeur->civilite);
$query->bindParam(':grade', $professeur->grade);

// Exécution de la requête
$query->execute();



/* Dans cet exemple, une classe Professeur est définie avec des propriétés pour les différentes colonnes de la table professeurs. Un nouvel objet Professeur est créé pour représenter le professeur à insérer. La méthode bindParam est utilisée pour lier les valeurs des propriétés de l'objet Professeur aux paramètres de la requête SQL. La requête SQL insère un nouvel enregistrement dans la table professeurs avec les valeurs fournies. */
?>
