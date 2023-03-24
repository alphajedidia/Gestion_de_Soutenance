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
    $sql = "SELECT * FROM organismes";
    $stmt = $bdd->query($sql);
    if ($stmt === false){
        die("error");
    }

    ?>
    <h1>Liste des organismes</h1>
    <table>
        <thead>
            <tr>
                <th>ID organisme</th>
                <th>Designation</th>
                <th>Lieu</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row ['id_org']);?></td>
                <td><?php echo htmlspecialchars ($row['design']) ;?></td>
                <td><?php echo htmlspecialchars($row ['lieu']);?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>