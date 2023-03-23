<?php
// Connexion à la base de données avec PDO
try {
	$bdd = new PDO('mysql:host=localhost;dbname=soutenances', 'nom_utilisateur', 'mot_de_passe');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Erreur : " . $e->getMessage();
	die();
}

// Récupération des données du formulaire
$matricule = $_POST['matricule'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$niveau = $_POST['niveau'];
$parcours = $_POST['parcours'];
$adr_email = $_POST['adr_email'];

// Préparation et exécution de la requête d'insertion
$insertion = $bdd->prepare("INSERT INTO etudiants (matricule, nom_etudiant, prenom_etudiant, niveau, parcours, adr_email) VALUES (?, ?, ?, ?, ?, ?)");
$insertion->execute(array($matricule, $nom, $prenom, $niveau, $parcours, $adr_email));

// Redirection vers la page d'accueil
header('Location: index.php');
exit();

/* Dans cet exemple, la page HTML contient un formulaire qui envoie les données saisies à la page PHP "ajouter_etudiant.php" via la méthode POST. La page PHP se connecte à la base de données, récupère les données du formulaire, prépare la requête d'insertion avec PDO, l'exécute avec les données récupérées et redirige l'utilisateur vers la page d'accueil. Notez que vous devez remplacer "nom_utilisateur" et "mot_de_passe" par votre nom d'utilisateur et votre mot de passe MySQL. */
?>
