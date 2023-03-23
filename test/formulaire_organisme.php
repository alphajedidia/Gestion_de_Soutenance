<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire organisme</title>
</head>
<body>
<?php require("Connexion.php"); ?>

<?php
/* Class etudiant */
class Organisme {
    private $id_org;
    private $design;
    private $lieu;
    
    public function __construct($id_org, $design, $lieu) {
        $this->id_org = $id_org;
        $this->design = $design;
        $this->lieu = $lieu;
    }
    public function getIdOrg() {
        return $this->id_org;
    }
    
    public function getDesign() {
        return $this->design;
    }
    
    public function getLieu() {
        return $this->lieu;
    }
}
    ?>
    <h1>Ajouter un organisme</h1>
    <form action="formulaire_organisme.php" method="post">
		<label for="id_org">Id Organisme :</label>
		<input type="number" id="idorg" name="id_org" required><br><br>
		<label for="design">Designation :</label>
		<input type="text" id="design" name="design" required><br><br>
		<label for="lieu">Lieu :</label>
		<input type="text" id="lieu" name="lieu" required><br><br>
		<input type="submit" value="Ajouter">
	</form>
    <?php
/* Récupération des données du formulaire */
$organisme = new Organisme($_POST['id_org'],$_POST['design'],$_POST['lieu']);

/* Préparation et exécution de la requête d'insertion */
$insertion = $bdd->prepare("INSERT INTO organismes (id_org, design, lieu) VALUES (?, ?, ?)");
try{
    $insertion->execute(array($organisme->getIdOrg(), $organisme->getDesign(), $organisme->getLieu()));
    echo "entered with success";
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