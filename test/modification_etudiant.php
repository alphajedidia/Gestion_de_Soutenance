<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Etudiant</title>
</head>
<body>

<?php require("Connexion.php");
$matricule_modif = '2422';
$sql = "SELECT * FROM etudiants WHERE matricule = $matricule_modif";
$stmt = $bdd->query($sql);
if ($stmt === false){
    die("error");
}
 ?>
<?php $row = $stmt->fetch(PDO::FETCH_ASSOC) ?>
    <h1>Ajouter un étudiant</h1>
    <form action="modification_etudiant.php" method="post">
		<label for="matricule">Matricule :</label>
		<input type="text" id="matricule" name="matricule"  value = " <?php echo htmlspecialchars($row ['matricule']);?> " require><br><br>
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" value = "<?php echo htmlspecialchars ($row['nom_etudiant']) ;?>" required><br><br>
		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" value = "<?php echo htmlspecialchars($row ['prenom_etudiant']);?>" required><br><br>
		<label for="niveau">Niveau :</label>
		<input type="text" id="niveau" name="niveau" value =" <?php echo htmlspecialchars ($row['niveau']) ;?> " required><br><br>
		<label for="parcours">Parcours :</label>
		<input type="text" id="parcours" name="parcours" value = " <?php echo htmlspecialchars($row ['parcours']);?> " required><br><br>
		<label for="adr_email">Adresse e-mail :</label>
		<input type="email" id="adr_email" name="adr_email" value = " <?php echo htmlspecialchars ($row['adr_email']) ;?> " required><br><br>
		<input type="submit" value="Modifier">
	</form>    
    <?php
/* Récupération des données du formulaire */
$matricule = $_POST['matricule'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$niveau = $_POST['niveau'];
$parcours = $_POST['parcours'];
$adr_email = $_POST['adr_email'];
echo $matricule;
$request= "UPDATE etudiants SET nom_etudiant = $nom WHERE matricule = $matricule_modif";
$lasa=$bdd->prepare($request);
$lasa->execute();
?>
</body>
</html>