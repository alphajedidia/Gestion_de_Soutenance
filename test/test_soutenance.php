<?php
/***********  Connection DB *********/
$host = 'localhost';
$dbname = 'soutenances';
$user = 'root';
$password = '';
$isConnected = false;
/* Connexion à la base de données avec PDO */
try {
	$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $isConnected = True;
    } 
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
    }
/***********  !Connection DB *********/

/* Recuperation de tous les prof */
$prof_query = $bdd->prepare("SELECT `id_prof`,`civilite` , `nom_prof` , `prenom_prof` FROM `professeurs`;");
$prof_query->execute();
$prof_result = $prof_query->fetchAll();

require_once("input_select.php");

/** Verification post */
require('Verification.php');
$postIsDefine = verificate($_POST,['matricule','id_org','annee_univ','note','president','examinateur','rapporteur_int','rapporteur_ext']);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Soutenance</title>
</head>
<body>

<?php 
if($isConnected){
    echo "connected with the database ". $dbname ;
}

require("soutenir_Model.php"); ?>
<div>
    <form action="test_soutenance.php" method="POST">
        <label for="matricule">Matricule :</label>
		<input type="text" id="matricule" name="matricule" required><br><br>
        
		<label for="annee_univ">Annee Universitaire :</label>
		<input type="text" id="annee_univ" name="annee_univ" required><br><br>

        <!-- SCRIPT PHP  -->
		<label for="id_org">Organisme :</label>
		<input type="text" id="id_org" name="id_org" required><br><br>

		<label for="note">Note :</label>
		<input type="text" id="note" name="note" required><br><br>

        <!-- SCRIPT PHP  -->
		<label for="president">President :</label>
        <select name="president" id="president" required>
            <?php 
            inputSelect($prof_result);
            ?>
        </select><br><br>

		<!-- SCRIPT PHP  -->
        <label for="examinateur">Examinateur :</label>
		<select id="examinateur" name="examinateur" required>
            <?php 
            inputSelect($prof_result);
            ?>
        </select><br><br>

        <!-- SCRIPT PHP  -->
        <label for="rapporteur_int">Rapporteur 1 :</label>
		<select id="rapporteur_int" name="rapporteur_int" required>
            <?php 
            inputSelect($prof_result);
            ?>
        </select><br><br>

        <!-- SCRIPT PHP  -->
        <label for="rapporteur_ext">Rapporteur 2 :</label>
		<select id="rapporteur_ext" name="rapporteur_ext" required>
            <?php 
            inputSelect($prof_result);
            ?>
        </select><br><br>

		<input type="submit" value="Ajouter">
    </form>
</div>

<?php 

// insertion
if($postIsDefine){
    $soutenir = new Soutenir($_POST["matricule"],$_POST["annee_univ"],$_POST["id_org"],$_POST["note"],$_POST["president"],$_POST["examinateur"],$_POST["rapporteur_int"],$_POST["rapporteur_ext"]);
    $soutenir_qry = "INSERT INTO `soutenir`(matricule,annee_univ,id_org,note,president,examinateur,rapporteur_int,rapporteur_ext) VALUES(?,?,?,?,?,?,?,?);";
    $insertion = $bdd->prepare($soutenir_qry);

    try{
        $insertion->execute(array($soutenir->getMatricule(),$soutenir->getAnnee_univ(),$soutenir->getId_org(),$soutenir->getNote(),$soutenir->getPresident(),$soutenir->getExaminateur(),$soutenir->getRapporteur_int(),$soutenir->getRapporteur_ext()));
        echo "enter with success";
        // Redirection
    }catch(PDOExecption $e){
        echo "Erreur : " . $e->getMessage();
        die();
    }
}


?>
<pre>
    <?= var_dump($prof_result)?>
</pre>

</body>

</html>