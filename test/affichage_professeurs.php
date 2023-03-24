<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>
    <style>
        h1{
            text-align : center ;
        }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin : 0 auto;
  width: 80%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
    <?php require("connexion.php");
    $sql = "SELECT * FROM professeurs";
    $stmt = $bdd->query($sql);
    if ($stmt === false){
        die("error");
    }

    ?>
    <h1>Liste des professeurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID Professeur</th>
                <th>Nom Professeur</th>
                <th>Prenom Professeur</th>
                <th>Civilité</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row ['id_prof']);?></td>
                <td><?php echo htmlspecialchars ($row['nom_prof']) ;?></td>
                <td><?php echo htmlspecialchars($row ['prenom_prof']);?></td>
                <td><?php echo htmlspecialchars ($row['civilite']) ;?></td>
                <td><?php echo htmlspecialchars($row ['grade']);?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>