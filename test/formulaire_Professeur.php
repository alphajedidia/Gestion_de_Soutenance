<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Professeur</title>
</head>
<body>
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
</body>
</html>