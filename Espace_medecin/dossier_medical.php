<!DOCTYPE html>
<html>
  <head>
    <title>Dossier médical</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <style>
        /* Définition des styles pour les titres */
h1 {
  color: #0a3d62;
  font-size: 36px;
  margin-top: 30px;
  margin-bottom: 20px;
}

/* Définition des styles pour les paragraphes */
p {
 
  font-size: 18px;
  margin-bottom: 10px;
}
.cont img{
 width:250px;
 height:250px;
 padding-top:100px;
}

/* Définition des styles pour le contenu de la page */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 30px;
  background-color: #CDEFFF ;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
 margin-top:60px;

}
.cont{
  display:flex;
}

/* Définition des styles pour les liens */
a {
  color: #007bff;
  text-decoration: none;
  transition: all 0.2s ease-in-out;
}

a:hover {
  color: #0056b3;
  text-decoration: underline;
}
body {
        background-image: url('../Assets/images/CONNEXION_BG.png');
        background-size: cover;
        background-position: center;
      }
</style>
    <div class="container">
      <!-- Contenu de la page ici -->
      <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "trial"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
// if (!$conn) {
//   die("La connexion a échoué: " . mysqli_connect_error());
// }

// Récupérer l'ID du dossier médical à afficher à partir de l'URL
$id = $_GET['id'];

// Récupérer les informations du dossier médical à partir de la base de données
$sql = "SELECT * FROM dossiers_medicaux WHERE id=$id";
$result = mysqli_query($conn, $sql);

// Afficher les informations du dossier médical
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $nom = $row["nom"];
  $prenom = $row["prenom"];
  $date_naissance = $row["date_naissance"];
  $poids = $row["poids"];
  $taille = $row["taille"];
  $numero_telephone = $row["numero_telephone"];
  $adresse = $row["adresse"];
  $maladies = $row["maladies"];
  $allergies = $row["allergies"];
  $vaccin = $row["vaccin"];

  // Afficher les informations du dossier médical dans une page détaillée
  echo'<div class="cont">';

  echo'<div>';
  echo "<h1>Dossier médical de $nom $prenom:</h1>";
  echo "<p><strong>Date de naissance:</strong> $date_naissance</p>";
  echo "<p><strong>Poids:</strong> $poids kg</p>";
  echo "<p><strong>Taille:</strong> $taille cm</p>";
  echo "<p><strong>Numéro de téléphone:</strong> $numero_telephone</p>";
  echo "<p><strong>Adresse:</strong> $adresse</p>";
  echo "<p><strong>Maladies:</strong> $maladies</p>";
  echo "<p><strong>Allergies:</strong> $allergies</p>";
  echo "<p><strong>Vaccin:</strong> $vaccin</p>";
  echo'</div>';
  echo '<img src="../Assets/Images/dossiermedical-removebg-preview.png"/>';
  echo'</div>';
} else {
  // Afficher un message d'erreur si le dossier médical n'a pas été trouvé
  echo "<p>Dossier médical introuvable.</p>";
}

mysqli_close($conn);
?>



    
    </div>
  </body>
</html>








