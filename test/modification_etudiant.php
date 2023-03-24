<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Etudiant</title>
</head>
<body>

<?php 
// Connexion à la base de données
require("connexion.php");
//matricule de l'etudiant à modifier
$matricule_modif = '2120';
$sql = "SELECT * FROM etudiants WHERE matricule = $matricule_modif;";
$stmt = $bdd->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <h1>Modifier un étudiant</h1>
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
    //NOUVELLES VALEUR
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $niveau = $_POST['niveau'];
    $parcours = $_POST['parcours'];
    $adr_email = $_POST['adr_email'];
    $matricule = $_POST['matricule'];
    //REQUETE SQL
    $request = 'UPDATE etudiants SET nom_etudiant = :nom_etudiant, prenom_etudiant = :prenom_etudiant, niveau = :niveau, parcours = :parcours, adr_email = :adr_email WHERE matricule = :matricule_modif';
    //PREPARATION
    $query = $bdd->prepare($request);
    //LIAISON DES VALEURS AUX PARAMATRE
    $query->bindParam(':nom_etudiant', $nom);
    $query->bindParam(':prenom_etudiant', $prenom);
    $query->bindParam(':niveau', $niveau);
    $query->bindParam(':parcours', $parcours);
    $query->bindParam(':adr_email', $adr_email);
    $query->bindParam(':matricule_modif', $matricule_modif);
    // Exécution de la requête
    $query->execute();
    
?>
</body>
</html>