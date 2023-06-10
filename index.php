<!DOCTYPE html>
<html>

<head>
  <title>Mon site web</title>
  <!-- Liens vers les fichiers CSS de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="./CSS/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;1,100;1,200&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;1,100;1,200&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@500&family=Poppins:ital,wght@0,100;1,100;1,200&family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@500&family=PT+Sans:ital@0;1&family=Poppins:ital,wght@0,100;1,100;1,200&family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body>

  <!-- header section starts  -->

  <header>

    <a href="#" class="titre">Cabinet Dr Baalhouss Hicham</a>
    <img src="./Assets/images/LOGO_medecin.png" class="logo" width="70px" height="70px" />
    <div id="menu" class="fas fa-bars">

    </div>

    <nav class="navbar">

      <a href="./Connexion.php">Espace patient</a>
      <a href="./Espace_medecin/formulaireconnexion.php">Espace administrateur </a>




    </nav>

  </header>
  <style>
    .card-wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .card {
      width: 90%;
      max-width: 400px;
      margin: 20px;
    }

    .card-body {
      position: relative;
    }

    #qrcode {
      position: absolute;
      bottom: 60px;
      right: 150px;
      max-width: 100%;
      height: auto;
    }


    @media (max-width: 768px) {

      .card1,
      .card2,
      .card3 {
        width: 100%;
      }

      .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card1,
      .card2,
      .card3 {
        width: 100%;
        margin-bottom: 20px;
      }
    }

    @media (max-width: 800px) {

      .card1,
      .card2,
      .card3 {
        width: 100%;
      }

      .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card1,
      .card2,
      .card3 {
        width: 100%;
        margin-bottom: 20px;
      }
    }

    @media (max-width: 900px) {

      .card1,
      .card2,
      .card3 {
        width: 100%;
      }

      .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card1,
      .card2,
      .card3 {
        width: 100%;
        margin-bottom: 20px;
      }
    }

    @media (max-width: 950px) {

      .card1,
      .card2,
      .card3 {
        width: 100%;
      }

      .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card1,
      .card2,
      .card3 {
        width: 100%;
        margin-bottom: 20px;
      }
    }

    @media (max-width: 1000px) {

      .card1,
      .card2,
      .card3 {
        width: 100%;
      }

      .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card1,
      .card2,
      .card3 {
        width: 100%;
        margin-bottom: 20px;
      }
    }

    @media (max-width: 1050px) {

      .card1,
      .card2,
      .card3 {
        width: 100%;
      }

      .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card1,
      .card2,
      .card3 {
        width: 100%;
        margin-bottom: 20px;
      }
    }

    @media (max-width: 1090px) {

      .card1,
      .card2,
      .card3 {
        width: 100%;
      }

      .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card1,
      .card2,
      .card3 {
        width: 100%;
        margin-bottom: 20px;
      }
    }

    @media (max-width: 1095px) {

      .card1,
      .card2,
      .card3 {
        width: 100%;
      }

      .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card1,
      .card2,
      .card3 {
        width: 100%;
        margin-bottom: 20px;
      }
    }


    /* Media query for screens smaller than 768px */
    @media (max-width: 767px) {
      table td {
        font-size: 14px;

      }

      .horaire {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      table {
        width: 100%;
        max-width: 600px;
        /* margin-bottom: 20px; */
        text-align: center;
        /* margin-left:50px;
    margin-right:200px; */
      }

      /* table td {
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
  } */

      .imagehoraire img {
        display: none;

      }
    }

    /* Media query for screens smaller than 480px */
    @media (max-width: 479px) {
      table td {
        font-size: 12px;
      }

      .imagehoraire img {
        max-width: 300px;
      }
    }
  </style>
  <!-- header section ends -->

  <!-- home section starts  -->

  <section class="home" id="home">

    <div class="content">
      <br>
      <br>
      <br>
      <br>
      <h1>Si vous prenez soin de votre corps</h1>
      <h3> il prendra soin de vous</h3>
      
    </div>

  </section>

  <!-- home section ends -->










  <section style="margin-top: 40px;">
    <h3 class="animate-text" style="position: abolute;">Points importants: </h3>
    <div class="cards-container">

      <div class="card1">

        <div class="card-img" style="background-image: url(./Assets/Images/Sans_titre-removebg-preview.png) ;background-repeat: no-repeat; background-position: center center;"></div>
        <div class="card-content">

          <h2 class="card-title">1. Accéder à son espace privé</h2>
          <p class="card-text">Identifiez-vous ou créez un compte.</p>
        </div>
      </div>

      <div class="card2">

        <div class="card-img" style="background-image: url(./Assets/Images/rendez_vous-removebg-preview.png);background-repeat: no-repeat; background-position: center center;"></div>
        <div class="card-content">
          <h2 class="card-title">2.Chercher son rendez-vous</h2>
          <p class="card-text">Choisissez un rendez-vous qui vous convient.</p>
        </div>
      </div>

      <div class="card3">

        <div class="card-img" style="background-image: url(./Assets/Images/dossiermedical-removebg-preview.png);background-repeat: no-repeat; background-position: center center;"></div>
        <div class="card-content">
          <h2 class="card-title">3.Remplir son dossier médical</h2>
          <p class="card-text">Complétez toutes les informations requises.</p>
        </div>
      </div>
    </div>


  </section>


  <section style="margin-top: 150px;">
    <h3 class="animate-text" style="position: relative; margin-bottom: 0;">Horaires de travail:</h3>
    <div class="horaire" style="margin-top: 0px;">

      <table>
        <tr>
          <td>Lundi:</td>
          <td>8:30h - 18h</td>
        </tr>
        <tr>
          <td>Mardi:</td>
          <td>8:30h - 18h</td>
        </tr>
        <tr>
          <td>Mercredi:</td>
          <td>8:30h - 18h</td>
        </tr>
        <tr>
          <td>Jeudi:</td>
          <td>8:30h - 18h</td>
        </tr>
        <tr>
          <td> Vendredi:</td>
          <td>8:30h - 18h</td>
        </tr>
        <tr>
          <td> Samedi:</td>
          <td>-----</td>
        </tr>
        <tr>
          <td> Dimanche:</td>
          <td>-----</td>
        </tr>
      </table>
      <div class="imagehoraire">
        <img src="./Assets/Images/Arriere-removebg-preview.png" alt="horaire">
      </div>
    </div>

  </section>
  <section style="margin-top: 70px;">
    <h3 class="animate-text">A propos du médecin: </h3>
    <div class="card-wrapper">
      <div class="card">
        <div class="card-header text-center">
          <div class="rounded-circle bg-secondary mx-auto my-4" style="width: 120px; height: 120px;">
            <img src="./Assets/Images/urologue-removebg-preview.png" alt="Photo du médecin" class="img-fluid rounded-circle" style="width: 100%; background-color: white;">
          </div>
          <h4 class="card-title mb-0" style="text-decoration: none; color:#0a3d62;">Hicham Balhouss </h4>
        </div>

        <div class="card-body">
          <p class="card-text;" style="background-color:#0a3d62; color :white ; border: 2px solid #3c6382;border-radius:20px;width:100px;text-align:center">Urologue</p>
          <div id="qrcode"></div>
        </div>
      </div>




      <div class="card">

        <div class="card-info">

          <ul>
            <li>Médecin Résident 2004 2009 au CHU IBN ROCHD CASABLANCA</li>
            <li>Urologue à L hôpital Régional Med 5 de 2010-2011.</li>
            <li>Urologue à L hôpital provincial Mokhtar soussi Taroudant 2011-2021.</li>
            <li>Médecin Chef du bloc opétoire 2017 2021 CHP de taroudant.</li>




          </ul>
        </div>
      </div>
    </div>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  </section>
  <section>
    <h3 class="animate-text">Ce que disent nos patients:</h3>
    <table class="table2">
      <tr>
        <td> <img src="./Assets/Images/avatar1-removebg-preview.png">Le service médical est très efficace .</td>
        <td> <img src="./Assets/Images/avatar2-removebg-preview.png">Traitements ont été très bénéfiques pour ma santé.</td>
      </tr>
      <tr>
        <td> <img src="./Assets/Images/avatar3-removebg-preview.png">Le service médical est très bien organisé </td>
        <td> <img src="./Assets/Images/avatar4-removebg-preview.png">Le personnel de santé est à l'écoute de mes besoins.</td>
      </tr>
      <tr>
        <td> <img src="./Assets/Images/avatar5-removebg-preview.png">Les technologies utilisés sont très modernes. </td>
        <td> <img src="./Assets/Images/avatar6-removebg-preview.png">Les coûts des examens médicaux sont convenables.</td>
      </tr>
    </table>

  </section>
  <div class="heading">
    <h3 class="animate-text">Découvrez notre site Doctori:</h3>

  </div>
  <footer>
    <div class="footer-wrapper">
      <div class="contact-info">
        <h3 style="color:#0a3d62">Nous contacter:</h3>
        <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
          </svg><i style="margin-right: 4px" class="bi bi-telephone-fill"></i>Téléphone:+212 5288-53484</p>

      </div>
      <div class="address">
        <h3 style="color:#0a3d62">Notre adresse:</h3>

        <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
          </svg><i style="margin-right: 4px" class="bi bi-geo-alt-fill"></i>Dar baroud imm Errahmani a coté de lycée Soulaimane Roudani Taroudant 83000,Maroc</p>

      </div>
      <div class="map">
        <h3 style="color:#0a3d62">Nous trouver:</h3>
        <div class="map"><!--ce div est pour la carte map-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3438.7618375593916!2d-8.878392825801322!3d30.471183198228466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb1736fbdb5bf37%3A0x6d250bed91470721!2sCabinet%20Dr%20BALHOUSS%20HICHAM!5e0!3m2!1sfr!2sma!4v1681597468615!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
        </div>
      </div>
    </div>
    <div class="copyright">
      <p>&copy; 2023 MonSite. Tous droits réservés.</p>
    </div>
  </footer>

  <script src="./JS/javascript.js"></script>
</body>

</html>