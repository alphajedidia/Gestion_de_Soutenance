<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Professeur</title>
</head>
<body>
<?php require("Connexion.php"); ?>
<?php
class Professeur {
    private $id_prof;
    private $nom_prof;
    private $prenom_prof;
    private $civilite_prof;
    private $grade_prof;
    
    public function __construct($id_prof, $nom_prof, $prenom_prof, $civilite_prof, $grade_prof) {
        $this->id_prof = $id_prof;
        $this->nom_prof = $nom_prof;
        $this->prenom_prof = $prenom_prof;
        $this->civilite_prof = $civilite_prof;
        $this->grade_prof = $grade_prof;
    }
    public function getId_prof() {
        return $this->id_prof;
    }
    
    public function getNom() {
        return $this->nom_prof;
    }
    
    public function getPrenom() {
        return $this->prenom_prof;
    }
    
    public function getCivilite() {
        return $this->civilite_prof;
    }
    
    public function getGrade() {
        return $this->grade_prof;
    }
}
?>
<h1>Ajouter un Professeur</h1>
    <form action="formulaire_Professeur.php" method="post">
		<label for="Id_prof">Id Professeur :</label>
		<input type="text" id="Id_prof" name="Id_prof" required><br><br>
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" required><br><br>
		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom"><br><br>
		<label for="civilite">Civilité :</label>
		<input type="text" id="civilite" name="civilite" required><br><br>
		<label for="grade">Grade :</label>
		<input type="text" id="grade" name="grade" required><br><br>
		<input type="submit" value="Ajouter">
	</form>
	<?php
/* Récupération des données du formulaire */
$professeur = new Professeur($_POST['Id_prof'],$_POST['nom'],$_POST['prenom'],$_POST['civilite'],$_POST['grade']);

/* Préparation et exécution de la requête d'insertion */
$insertion = $bdd->prepare("INSERT INTO professeurs (id_prof, nom_prof, prenom_prof, civilite, grade) VALUES (?, ?, ?, ?, ?)");
try{
    $insertion->execute(array($professeur->getId_prof(), $professeur->getNom(), $professeur->getPrenom(), $professeur->getCivilite(), $professeur->getGrade()));
    echo "enter with success";
    $_POST = null;
}
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}
$bdd=null;
?>
</body>
</html>
