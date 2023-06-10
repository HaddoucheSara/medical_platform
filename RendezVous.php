
<?php
//connexion dans la base de donnée
if(isset($_POST['nom'])) {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "trial";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Erreur: ' . $conn->connect_error);
    }
$NOM=$_POST['nom'];
$PRENOM=$_POST['prenom'];
$EMAIL=$_POST['email'];
$TEL=$_POST['telephone'];
$DATE=$_POST['trip-start'];
$HEURE=$_POST['appt'];
$sql ="INSERT INTO info_rendez(nom,prenom,email,telephone,datee,heuree) values('$NOM','$PRENOM','$EMAIL','$TEL','$DATE','$HEURE')";
$conn->query($sql);

  // Inclure les valeurs des champs de saisie dans le formulaire HTML
  $formValues = "<p><strong>Nom:</strong> $NOM</p>";
  $formValues .= "<p><strong>Prénom:</strong> $PRENOM</p>";
  $formValues .= "<p><strong>Numéro de téléphone:</strong> $TEL</p>";
  $formValues .= "<p><strong>Date:</strong> $DATE</p>";
  $formValues .= "<p><strong>Heure:</strong> $HEURE</p>";
  $conn->close();}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctori</title>
    <style>
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
  html{
    font-size: 60.5%;
    overflow:hidden;
  }
  
  section{
    min-height: 100vh;
    padding:1rem 9%;
    padding-top: 8rem;
  }
  
  
  .heading{
    height: 10%;
    margin-bottom: 2%;
  }
  
 header{
 background-color: white;

    position: fixed;
    width:100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: fixed;
    top:0; left:0;
    z-index: 1000;
    padding:1rem;
    box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.1);
 }
  
  header .titre{
    font-size: 2.5rem;
    color:var(--dark-blue) ;
    align-self: auto;
    text-decoration: none;
  }
  
  header .logo span{
    color:var(--blue);
  }
  .logo{
    margin-left:-150px;
  }
  
  header .navbar a{
    text-decoration: none;
    font-size: 1.7rem;
    margin-left: .1rem;
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
  
  #menu{
    font-size: 3rem;
    color:var(--blue);
    cursor: pointer;
    display: none;
  }
  .confirm{
    background: linear-gradient(to bottom, #CDEFFF ,  #ffff);
    height:42rem;
    width:82%;
    margin:15rem 4rem 0rem 11.5rem;
    border-radius:2rem;
    box-shadow: 0 0.2rem 0.52rem rgba(0, 0, 0, 0.1);
  }
  .confirmation{
    display:flex;
  }
  .info{
    color:rgb(38, 201, 201);
  }
  h1{
    text-align: center;
    color:#7eaccd;
  
  }
  .H1{
     padding-top:2.5rem;
  }
  h3{ 
    color:#0a3d62;
    font-size:2.1rem;
    text-align:center;
    padding-top:6rem;
  }
  h4{
    text-align:center;
    padding-top:6.3rem;
    font-size:1.5rem;
    color:#0a3d62;
}
  .photo-confirm{
    height:65rem;
    width:52rem;
    margin-top:8.5rem;
    
  }
  button {
    padding: 1rem 2rem;
    background-color: #0a3d62;
    color: #fff;
    border: none;
    border-radius: 0.52rem;
    cursor: pointer;
    margin-top:4rem;
  
  }
  /*Media queries*/
  @media (max-width: 1100px) {
  header {
    height: auto;
    flex-direction: column;
    padding: 1rem;
    height:120px;
  }
  .logo{
    margin-left:0.1rem;
    margin-top:-1.8rem;
    height:50px;
    width:50px;
    margin-bottom:1rem;
  }
  .navbar{
    margin-top:-3rem;
    font-size:1.2rem;
  }
  .titre{
    font-size:1.6rem;
  }
}
@media (max-width: 800px) {
  .confirm{
    margin-left:5%;
    margin-right:8%;
  }
}
@media (max-width: 588px){
  .confirm{
    padding:0.7rem;
  }
  h3{
  margin-top:-1rem;
  font-size:1.9rem;
  }
  h4{
    margin-top:-2rem;
    font-size:1.5rem;
  }
 button{
  font-size:1.1rem;
 }
 h1{
  font-size:1.9rem;
 }
 .confirm{
  width:90%;
 }
}




    </style>
    <!--pdf-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> 
</head>
<body>
<header>
    <a href="#" class="titre ">Cabinet Dr Baalhouss Hicham </a>
    <img src="./Assets/Images/LOGO_medecin.png" class="logo" width="90px" height="90px"/>
    <div id="menu" class="fas fa-bars"> </div>
    <nav class="navbar">
        <a href="./EspacePatient.php." >Revenir a mon Espace </a>
    </nav>
  </header>
  <div class="confirm">
    <div class="H1">
      <h1> Confirmation de votre rendez-vous</h1>
   </div>
   <div class="confirmation">
   <div class="photo-confirm">
    <img src="./Assets/Images/rendez_vous-removebg-preview.png" >
   </div>
    <div class="text-confirm">
    <h3><?php  echo($NOM."  ".$PRENOM)?></h3>
    <h4>Votre rendez-vous est bien enregistré</h4>
    <h4> Votre rendez-vous est prévu le <span class="info"><?php echo($DATE)?></span> à <span class="info"><?php echo($HEURE)?> </span>
    <div >
        <button type="submit" name="generate_pdf" onclick="downloadForm()">Télécharger PDF</button>
    </div>
   </div>

  </div>
  
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
doc.text("Document de confirmation de rendez-vous", 120, 16);
//Ajouter une ligne
doc.setLineWidth(0.5);
doc.setDrawColor("#0a3d62");
doc.line(10, 25, 203, 25);
// Ajouter le contenu du formulaire
doc.setFontSize(10);
doc.fromHTML(formValues, 20, 50);
doc.setFontSize(10);
// Enregistrer le PDF
doc.save("rendez-vous.pdf");
}
</script>

</body>
</html>

