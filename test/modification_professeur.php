<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Professeur</title>
</head>
<body>

<?php 
// Connexion à la base de données
require("connexion.php");
//id_prof de l'etudiant à modifier
$id_prof_modif = "gil101";
$sql = "SELECT * FROM professeurs WHERE id_prof = $id_prof_modif";
$stmt = $bdd->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <h1>Modifier un profeseur</h1>
    <form action="modification_professeur.php" method="post">
		<label for="id_prof">id_prof :</label>
		<input type="text" id="id_prof" name="id_prof"  value = " <?php echo htmlspecialchars($row ['id_prof']);?> " require><br><br>
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" value = "<?php echo htmlspecialchars ($row['nom_prof']) ;?>" required><br><br>
		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" value = "<?php echo htmlspecialchars($row ['prenom_prof']);?>" required><br><br>
		<label for="civilite">civilite :</label>
		<input type="text" id="civilite" name="civilite" value =" <?php echo htmlspecialchars ($row['civilite']) ;?> " required><br><br>
		<label for="grade">grade :</label>
		<input type="text" id="grade" name="grade" value = " <?php echo htmlspecialchars($row ['grade']);?> " required><br><br>
		<input type="submit" value="Modifier">
	</form>    
    <?php
    //NOUVELLES VALEUR
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $civilite = $_POST['civilite'];
    $grade = $_POST['grade'];
    $id_prof = $_POST['id_prof'];
    //REQUETE SQL
    $request = 'UPDATE professeurs SET nom_prof = :nom_prof, prenom_prof = :prenom_prof, civilite = :civilite, grade = :grade WHERE id_prof = :id_prof_modif';
    //PREPARATION
    $query = $bdd->prepare($request);
    //LIAISON DES VALEURS AUX PARAMATRE
    $query->bindParam(':nom_prof', $nom);
    $query->bindParam(':prenom_prof', $prenom);
    $query->bindParam(':civilite', $civilite);
    $query->bindParam(':grade', $grade);
    $query->bindParam(':id_prof_modif', $id_prof_modif);
    // Exécution de la requête
    $query->execute();
?>
</body>
</html>