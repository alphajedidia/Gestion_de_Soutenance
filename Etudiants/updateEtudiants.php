<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Connexion à la base de données
$pdo = new PDO('mysql:localhost=nom_hote;dbname=testmodif', 'root', '');
// ID de l'étudiant à mettre à jour
$id_etudiant = 1;
$sql = "SELECT * FROM etudiants WHERE id_etudiant = $id_etudiant;";
$execSql = $pdo->query($sql);
$row = $execSql->fetch(PDO::FETCH_ASSOC);
?>
<h1>Ajouter un étudiant</h1>
    <form action="updateEtudiants.php" method="post">
		<label for="id_etudiant">id etudiant :</label>
		<input type="text" id="id_etudiant" name="id_etudiant"  value = " <?php echo htmlspecialchars($row ['id_etudiant']);?> " require><br><br>
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" value = "<?php echo htmlspecialchars ($row['nom_etudiant']) ;?>" required><br><br>
		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" value = "<?php echo htmlspecialchars($row ['prenom_etudiant']);?>" required><br><br>
		<input type="submit" value="Modifier">
	</form>
<?php
// Nouvelles valeurs pour les champs nom_etudiant et prenom_etudiant

$nouveau_nom_etudiant = $_POST['nom'];
$nouveau_prenom_etudiant = $_POST['prenom'];

// Requête SQL pour mettre à jour les données de l'étudiant avec l'ID donné
$sql = 'UPDATE etudiants SET nom_etudiant = :nom_etudiant, prenom_etudiant = :prenom_etudiant WHERE id_etudiant = :id_etudiant';

// Préparation de la requête
$query = $pdo->prepare($sql);

// Liaison des valeurs aux paramètres de la requête
$query->bindParam(':nom_etudiant', $nouveau_nom_etudiant);
$query->bindParam(':prenom_etudiant', $nouveau_prenom_etudiant);
$query->bindParam(':id_etudiant', $id_etudiant);

// Exécution de la requête
$query->execute();


/*
    Dans cet exemple, la méthode bindParam est utilisée pour lier les valeurs aux paramètres de la requête. La requête SQL met à jour les champs nom_etudiant et prenom_etudiant pour l'étudiant ayant l'ID donné. Il est important de noter que le paramètre id_etudiant doit correspondre à la clé primaire de la table, qui dans cet exemple est une colonne nommée id_etudiant.
*/
?>
</body>
</html>
