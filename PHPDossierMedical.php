<?php
// connexion à la base de données
if(isset($_POST['nom'])) {  // Vérifie si le nom a été soumis dans le formulaire
    $servername = "localhost"; // Nom du serveur MySQL
    $username = "root"; // Nom d'utilisateur MySQL
    $password = "root"; // Mot de passe MySQL
    $dbname = "trial"; // Nom de la base de données MySQL
    $conn = new mysqli($servername, $username, $password, $dbname); // Crée une nouvelle connexion MySQL
    if ($conn->connect_error) { // Vérifie si la connexion a échoué
        die('Erreur: ' . $conn->connect_error); // Affiche un message d'erreur et arrête le script
    }
    //insertion dans la base de donnée
    $Nom = $_POST['nom'];
    
    $Date = $_POST['date'];
    $Poids = $_POST['poids'];
    $Taille = $_POST['taille'];
    $num = $_POST['tel'];
    $Adresse = $_POST['adres'];
    $Maladies = $_POST['maladie'];
    $Allergies = $_POST['allergies'];
    $Vaccin = $_POST['vaccin'];
    $Prenom = $_POST['user'];
    $sql = "INSERT INTO dossiers_medicaux  (nom, prenom, date_naissance, poids, taille, numero_telephone, adresse, maladies, allergies, vaccin) VALUES ('$Nom', '$Prenom', '$Date', '$Poids', '$Taille' , '$num', '$Adresse', '$Maladies', '$Allergies', '$Vaccin')";
    $conn->query($sql);
    // Inclure les valeurs des champs de saisie dans le formulaire HTML
    $formValues = "<p><strong>Nom:</strong> $Nom</p>";
    $formValues .= "<p><strong>Prénom:</strong> $Prenom</p>";
    $formValues .= "<p><strong>Date de naissance:</strong> $Date</p>";
    $formValues .= "<p><strong>Poids:</strong> $Poids</p>";
    $formValues .= "<p><strong>Taille:</strong> $Taille</p>";
    $formValues .= "<p><strong>Numéro de téléphone:</strong> $num</p>";
    $formValues .= "<p><strong>Adresse:</strong> $Adresse</p>";
    $formValues .= "<p><strong>Maladies:</strong> $Maladies</p>";
    $formValues .= "<p><strong>Allergies:</strong> $Allergies</p>";
    $formValues .= "<p><strong>Vaccins:</strong> $Vaccin</p>";
    $conn->close();}

?>

<!-- Le reste est du code HTML et CSS pour structurer et styler la page  -->
  
  <!DOCTYPE html>
    <html lang="en">
    <head>
          
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dossier Medical</title>
        <style>
          body{
    background: url("./card.png") no-repeat center center fixed;
}
header{
    width:100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: fixed;
    top:0; left:0;
    z-index: 1000;
    padding:2rem;
    background-color: white;
  }
  header #toggler {
            display: none;
        }

        header .respo {

            cursor: pointer;
            /* le curseur devient la petite ligne */
            display: none;
            /*ça ne va pas s'afficher sur la page */
        }
  
  header .titre{
    font-size: 1.6rem;
    color:var(--dark-blue) ;
    align-self: auto;
    text-decoration: none;
  }
  
  header .logo {
    align-self: center;
    color:var(--blue);
    margin-right: 0px;
  }
  
  header .navbar a{
    text-decoration: none;
    font-size: 1.2rem;
    margin-left: .2rem;
    padding:.5rem 2rem;
    border-radius: .5rem;
    color:var(--dark-blue);
  }
  
  header .navbar a.active,
  header .navbar a:hover{
    background: var(--blue);
    color:#fff;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
  }
  
  header.sticky{
    background:#fff;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
  }
.logo{
   text-align: center;
   font-size: 250%;
   color: white;
   font-family: 'Lobster', cursive;
}
.card {
    height:60%;
    width:60%;
    margin: 0 auto;
    background:linear-gradient(to bottom, rgb(76, 200, 234),#CDEFFF);
    border-radius: 5%;
    margin-top:13%;
   
  
  }
.card-content{
     margin-top :20px;
     width: 400px;
     height: 250px;
      margin-left:8%;
      font-size:18px;
      font-family:'Courier New', Courier, monospace;
      color: white;
      text-align: center;
      margin-right:10%;
      margin-bottom:5px;
}
.photo{
  margin-left: 0;
}
.photo img {
  margin-top :-5%;;
  margin-left:-10%;
  margin-right: 20px;
  width: 65%;
  height:100%;
  border-radius: 50% 50% 50% 50%;
}
.remerciment{
  margin-top: -5%;
    display: flex;
    margin-left: 60px;
}
.button-57 {
    width:50%;
    margin-bottom: 3%;
    left: 20%;
    margin-left: 5%;
    position: relative;
    overflow: hidden;
    border: 1px solid #18181a;
    color:rgb(76, 200, 234);
    display: inline-block;
    font-size: 15px;
    line-height: 15px;
    padding: 18px 18px 17px;
    text-decoration: none;
    cursor: pointer;
    background: #fff;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    font-family: 'Lobster', cursive;
    }
    .button-57 span:first-child {
    width:50%;
    position: relative;
    transition: color 600ms cubic-bezier(0.48, 0, 0.12, 1);
    z-index: 10;
    font-family: 'Lobster', cursive;
    }
    .button-57 span:last-child {
      width:50%;
    color: white;
    display: block;
    position: absolute;
    bottom: 0;
    transition: all 500ms cubic-bezier(0.48, 0, 0.12, 1);
    z-index: 100;
    opacity: 0;
    top: 50%;
    left: 50%;
    transform: translateY(225%) translateX(-50%);
    height: 14px;
    line-height: 13px;
    font-family: 'Lobster', cursive;
    }
    .button-57:after {
      width:50%;
    content: "";
    position: absolute;
    bottom: -50%;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(76, 200, 234);
    transform-origin: bottom center;
    transition: transform 600ms cubic-bezier(0.48, 0, 0.12, 1);
    transform: skewY(9.3deg) scaleY(0);
    z-index: 50;
    font-family: 'Lobster', cursive;
    }
    .button-57:hover:after {
    transform-origin: bottom center;
    transform: skewY(9.3deg) scaleY(2);
    font-family: 'Lobster', cursive;
    }
    .button-57:hover span:last-child {
    transform: translateX(-50%) translateY(-100%);
    opacity: 1;
    transition: all 900ms cubic-bezier(0.48, 0, 0.12, 1);
    font-family: 'Lobster', cursive;
    }
    /style header/
    :root{
      --blue:#3c6382;
      --dark-blue:#0a3d62;
    }
    
    *{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ; 
      margin:0; padding:0;
      box-sizing: border-box;
      text-decoration: none;
      outline: none;
      border:none;
      text-transform: capitalize;
    
    
    }
    
    *::selection{
      background:var(--dark-blue);
      color:#fff;
    }
    
    .heading{
      height: 30%;
      margin-bottom: 5%;
    }
    /* Responsive */
   
@media (max-width:900px) {
  header {
    height: auto;
    flex-direction: column;
    padding: 1rem;
  }

  header .titre {
    font-size: 24px;
    margin-bottom: 1rem;
  }

  nav.navbar {
    flex-direction: column;
    align-items: flex-start;
  }

  .card-content {
  font-size: 12px;
 }
 

  nav.navbar a {
    margin: 0.5rem 0;
    font-size: 16px;
  }
  .card{margin-top:25%;}
  

  .photo img {
    height: 280px;
    width: 85px;
  }
  
}


        </style>
      
    <!--pdf-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> 
</head>
<body>
<header>
        <!-- Pour la responsivité  -->
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="respo icon ion-ios-home"></label>

        <a href="#" class="titre">Cabinet Dr Baalhouss Hicham </a>
        <img src="./Assets/images/LOGO_medecin.png" class="logo" width="70px" height="70px" />
        <div id="menu" class="fas fa-bars">

        </div>

        <nav class="navbar">

            <a href="./EspacePatient.php">Revenir à mon espace </a>
            


        </nav>

    </header>
    <div class="card" > 
        <div class="logo">Confirmation:</div>
        <br>
        <br>
        <br>
        <br>
        <div class="remerciment">
        <div class="photo">
            <img src="./Assets/Images/image_confirmation_dossier_Medicale.jpg" >
        </div>   
        <div class="card-content">
        <h3><?php  echo($Nom."  ".$Prenom)?></h3>
        <br>
        
            <h4>Votre dossier medicale est bien enregistré</h4>
            <br>
            <h5>On est honoré que vous avez choisi de nous faire confiance pour votre santé et votre bien-être. </h4>
            </div>
        </div>
        <button class="button-57" role="button" onclick="downloadForm()"><span class="text">Télécharger le dossier medicale en PDF</span><span>record</span></button>

    </div>
       
  <!--pour generer le pdf-->
  <script>
  function downloadForm() {
    const doc = new jsPDF();
    const formValues = "<?php echo $formValues; ?>";
// Ajouter le logo
const logo = new Image();
logo.src = "./assets/Images/LOGO_medecin.png";
doc.addImage(logo, "png", 8,5, 20, 20);
doc.setFontSize(10);
doc.setTextColor("#0a3d62");
doc.text("Dr.BALHOUSS Hicham", 30, 16);

// Ajouter le nom du cabinet
doc.setFontSize(12);
doc.setTextColor("#0a3d62");
doc.text("Document de confirmation de Dossier Medical", 120, 16);
//Ajouter une ligne
doc.setLineWidth(0.5);
doc.setDrawColor("#0a3d62");
doc.line(10, 25, 203, 25);
// Ajouter le contenu du formulaire
doc.setFontSize(10);
doc.fromHTML(formValues, 20, 50);
doc.setFontSize(10);
// Enregistrer le PDF
doc.save("dossier_Medical.pdf");
}
</script>
</body>
</html>