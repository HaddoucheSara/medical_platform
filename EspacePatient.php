<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: Connexion.php");
    exit;
}

// Check if the Nom key is set in the $_SESSION array
if (isset($_SESSION["Nom"])) {
    $Nom = htmlentities($_SESSION["Nom"]);
} else {
    $Nom = "fail";
}

// Define your database credentials
$host = 'localhost'; // or your database host
$username = 'root'; // your database username
$password = 'root'; // your database password
$dbname = 'trial'; // your database name

// Create a new mysqli object and connect to your database
$mysqli = new mysqli($host, $username, $password, $dbname);

// Define the query to retrieve the most recent auto-incremented ID
$maxIdQuery = "SELECT MAX(id) AS maxId FROM dossiers_medicaux";

// Execute the query and retrieve the result set
$maxIdResult = $mysqli->query($maxIdQuery);

// Check for errors
if (!$maxIdResult) {
    die('Error executing query: ' . $mysqli->error);
}

// Fetch the result set as an associative array
$maxIdData = $maxIdResult->fetch_assoc();

// Retrieve the most recent auto-incremented ID
$maxId = $maxIdData['maxId'];

// Define the query to retrieve the desired data for the most recent ID
$query = "SELECT poids, taille , date_naissance FROM dossiers_medicaux WHERE id = $maxId";

// Execute the query and retrieve the result set
$result = $mysqli->query($query);

// Check for errors
if (!$result) {
    die('Error executing query: ' . $mysqli->error);
}

// Fetch the first row of the result set as an associative array
$data = $result->fetch_assoc();


// Assume that $dateOfBirth contains the date of birth as a string in the format 'YYYY-MM-DD'
$dateOfBirth = $data['date_naissance'];
// Create a new DateTime object from the date of birth
$birthDate = new DateTime($dateOfBirth);

// Get the current date as a new DateTime object
$today = new DateTime();

// Calculate the difference between the two dates
$ageInterval = $today->diff($birthDate);

// Get the age as an integer
$age = $ageInterval->y;




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Patient </title>

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="./CSS/StylesEspacePatient.css">
    <style>
        header #toggler {
            display: none;
        }

        header .respo {

            cursor: pointer;
            /* le curseur devient la petite ligne */
            display: none;
            /*ça ne va pas s'afficher sur la page */
        }

        .grid-item p {
            text-align: center;
            margin-top: 12px;
            margin-bottom: 12px;
            font-size: 13px;
            color: antiquewhite;
        }

        #g-i1.active #hover-div {
            display: block;
        }

        #hover-div {
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 80px;
            display: none;
            width: 120px;
            height: 120px;
            background-color: #80D3D3D3;
            color: aqua;
            text-align: center;
            padding-top: 50%;
            box-sizing: border-box;
        }

        #hover-div>label {
            font-size: 30px;


            color: #0a3d62;
        }


        .main-container {
            height: 510px;

            margin-top: 110px;
            margin-left: 35px;
            margin-right: 35px;
            padding-bottom: 25px;
            column-gap: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Create a 3-column grid */
            grid-template-rows: repeat(2, 1fr);
            /* Create a 2-row grid */
            row-gap: 14px;
            /* Add some spacing between grid items */
            justify-items: center;
            /* Center grid items horizontally */
            align-items: center;
            /* Center grid items vertically */

        }

        .main-container .prendresoin {
            margin-top: 0px;
            height: 80%;
            width: 100%;
            grid-column: span 2;
            grid-row: 1;
            border-radius: 30px;


        }

        .prendresoin h2,
        .prendresoin p {
            text-align: center;
            margin-left: 10px;
        }

        .prendresoin h2 {
            font-size: 30px;
            margin-top: 45px;
            margin-bottom: 20px;
            color: #0a3d62;
        }

        .prendresoin p {
            font-size: 15px;
            color: #0a3d62;
        }

        .prendresoin span {
            color: #BED537;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 240px;
            width: 500px;
            border-radius: 30px;
            background-image: url("./Assets/Images/CONNEXION_BG.png");
            background-size: cover;
            border: solid 1px #0a3d62;
            box-shadow: 0 .5rem 3rem rgba(0, 0, 0, .1);
        }

        .card a {
            text-decoration: none;
            font-size: 1.7rem;
            margin-left: .1rem;
            padding: .5rem 2rem;
            border-radius: .5rem;
            text-align: center;
            background: var(--blue);
            color: #fff;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            margin-top: 30px;
            z-index: 1000;
        }

        .card h2 {
            color: #0a3d62;

            font-size: 20px;
        }

        .card p {
            color: #3c6382;
            margin-top: 10px;
            font-size: 15px;
        }


        .card a.active,
        .card a:hover {
            background: white;
            color: #3c6382;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        }

        .dossier-medical {
            grid-column: 1;

            grid-row: 2;

        }

        .rendez-vous {
            grid-column: 2;
            grid-row: 2;

        }

       


        @media (max-width:905px) {
            .card {
                height: 200px;
                width: 270px;

            }

            .main-container {
                column-gap: 10px;
            }


        }

        @media (max-width:570px) {

            /* Header  */
            header .navbar {
                position: absolute;
                right: 0;
                left: 0;
                top: 100%;
                background: #eee;
                padding: 6px;
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
                transition: clip-path 0.5s ease-in-out;
                /* Hide the navbar by default */
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            }

            header .titre {
                font-size: 1.9rem;
            }

            header .respo {
                display: block;
                /* afficher l'icône */
            }

            /* Show the navbar when the toggler is checked */
            header #toggler:checked~.navbar {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }

            header label {
                font-size: 18px;
                color: #0a3d62;
            }



            header .navbar a {
                margin: 1.5rem;
                padding: 1.5rem;
                background: #fff;
                border: .1rem solid rgba(0, 0, 0, .1);
                display: block;
                /*Une en dessous de l'autre   */

            }


            .main-container {
                column-gap: 10px;
            }

            .card {
                height: 200px;
                width: 400px;
            }

            .main-container {
                height: auto;
                grid-template-columns: 1fr;
                grid-template-rows: repeat(4, 1fr);
            }

            .prendresoin {
                grid-column: 1;
                grid-row: 1;
            }

            .prendresoin h2 {
                margin-bottom: 30px;
            }

            .prendresoin p {
                margin-top: 10px;
                margin-bottom: 25px;

            }

            .dossier-medical {
                grid-column: 1;
                grid-row: 2;
            }

            .rendez-vous {
                grid-column: 1;
                grid-row: 3;
            }

            .documents {
                grid-column: 1;
                grid-row: 4;
            }
        }




        /* Résponsivité */
        @media (max-width: 400px) {

            /* styles for smaller screens */

            /* Header  */
            header .navbar {
                position: absolute;
                right: 0;
                left: 0;
                top: 100%;
                background: #eee;
                padding: 6px;
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
                transition: clip-path 0.5s ease-in-out;
                /* Hide the navbar by default */
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            }

            header .titre {
                font-size: 1.7rem;
                margin-left: 10px;
            }


            header .logo {
                width: 40px;
                height: 40px;
            }

            header .respo {
                display: block;
                /* afficher l'icône */
            }

            /* Show the navbar when the toggler is checked */
            header #toggler:checked~.navbar {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }

            header label {
                font-size: 18px;
                color: #0a3d62;
            }



            header .navbar a {
                margin: 1.5rem;
                padding: 1.5rem;
                background: #fff;
                border: .1rem solid rgba(0, 0, 0, .1);
                display: block;
                /*Une en dessous de l'autre   */

            }





            /* Main page  */


            #myDiv {
                width: 100%;
            }

            .main-container {
                height: auto;
                grid-template-columns: 1fr;
                grid-template-rows: repeat(4, 1fr);
            }

            .prendresoin h2 {
                font-size: 20px;
                margin-top: 10px;
                margin-bottom: 10px;

            }

            .prendresoin p {
                font-size: 15px;
                color: #0a3d62;

            }

            .card {
                width: 300px;
            }

            .card h2 {
                font-size: 15px;
            }

            .card p {
                font-size: 15px;
            }

            .card a {
                text-decoration: none;
                font-size: 1.2rem;
                margin-left: .1rem;
                padding: .4rem 1.5rem;
                border-radius: .5rem;
                text-align: center;
                background: var(--blue);
                color: #fff;
                box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
                margin-top: 30px;
            }

            .prendresoin {
                grid-column: 1;
                grid-row: 1;
            }

            .dossier-medical {
                grid-column: 1;
                grid-row: 2;
            }

            .rendez-vous {
                grid-column: 1;
                grid-row: 3;
            }

            .documents {
                grid-column: 1;
                grid-row: 4;
            }


        }
    </style>
</head>

<body>









    <!-- header section starts  -->

    <header>
        <!-- Pour la responsivité  -->
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="respo icon ion-ios-home"></label>

        <a href="#" class="titre">Cabinet Dr Baalhouss Hicham </a>
        <img src="./Assets/images/LOGO_medecin.png" class="logo" width="70px" height="70px" />
        <div id="menu" class="fas fa-bars">

        </div>

        <nav class="navbar">

            <a href="./index.php">Acceuil</a>
            <a href="#" id="showDivButton">Mon Profil </a>
            <a href="./Deconnexion.php">Se déconnecter </a>


        </nav>

    </header>
    <!-- header section ends -->



    <!-- Main container  -->
    <div class="main-container">
        <div class="prendresoin">
            <h2>Bienvenue <span><?php echo $_SESSION["Nom"] . " " . $_SESSION["Prenom"]; ?></span></h2>
            <p>Nous sommes ravis de vous accueillir dans votre espace personnel en ligne. <br>Cet espace vous permet de gérer votre dossier médical,et prendre rendez-vous , en toute securité en toute sécurité.</p>
        </div>

        <div class="card dossier-medier">
            <h2>Dossier médical</h2>
            <p>Gardez votre dossier médical à jour en remplissant les informations importantes sur votre santé.</p>
            <a href="./dossierMedical.html">Remplir mon dossier médical</a>
        </div>

        <div class="card rendez-vous">
            <h2>Rendez-vous</h2>
            <p>Prenez rendez-vous avec notre cabinet médical en quelques clics pour une consultation en personne </p>
            <a href="./indexRendezVous.html">Prendre un rendez-vous</a>
        </div>

        


    </div>






    <!-- Début du Div du profil -->
    <div id="myDiv">
        <div class="grid-container">
            <!-- <div id="g-i1" style="position: relative;">
                <img src="./Assets/Images/Photo2.png" alt="profile">
                <div id="hover-div">
                    <a href="#" class="icon ion-camera"></a>
                    <input type="file" id="image-upload" accept="image/*" style="display:none;">
                </div>
            </div> -->
            <form action="Importer_Image.php" method="post" id="g-i1" enctype="multipart/form-data">
                <div style="position: relative;">
                    <img src="./Assets/Images/Photo2.png" alt="profile">
                    <div id="hover-div">
                        <label for="file-upload" class="icon ion-camera"></label>
                        <input type="file" id="file-upload" name="file-upload" accept="image/*" style="display:none;">
                    </div>
                </div>
                <button type="submit"></button>
            </form>





            <div id="g-i2">
                <h3><?php echo $_SESSION["Nom"] . " " . $_SESSION["Prenom"]; ?></h3>
            </div>
            <div class="grid-item" id="g-i3">

                <h4 style="font-size: 13px;"><?php echo strtoupper($data['poids']); ?></h4>

                <p>Poids</p>
            </div>
            <div class="grid-item" id="g-i4">

                <h4 style="font-size: 13px;"><?php echo strtoupper($data['taille']); ?></h4>

                <p>Taille</p>
            </div>
            <div class="grid-item" id="g-i5">

                <h4 style="font-size: 13px;"><?php echo strtoupper($age); ?></h4>

                <p>Age</p>
            </div>
        </div>
        <div id="calendar"></div>

    </div>



    <!-- Fin du Div du profil -->


    <!-- Design principal -->

    <script>
        const g_i1 = document.getElementById("g-i1");

        g_i1.addEventListener("click", function() {
            g_i1.classList.toggle("active");
        });

        document.addEventListener("click", function(event) {
            if (!g_i1.contains(event.target)) {
                g_i1.classList.remove("active");
            }
        });



        //   Afficher l'image dans le div correspondant 
        const uploadInput = document.getElementById("file-upload");
        const profileImage = document.querySelector("#g-i1 img");

        uploadInput.addEventListener("change", function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function() {
                const image = new Image();
                image.addEventListener("load", function() {
                    const canvas = document.createElement("canvas");
                    const ctx = canvas.getContext("2d");
                    canvas.width = 120;
                    canvas.height = 120;
                    ctx.fillStyle = "transparent"; // set canvas background to transparent
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    ctx.save();
                    ctx.beginPath();
                    ctx.arc(canvas.width / 2, canvas.height / 2, 60, 0, Math.PI * 2); // draw circle
                    ctx.closePath();
                    ctx.clip();
                    ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
                    ctx.restore();
                    profileImage.src = canvas.toDataURL("image/png");
                });
                image.src = reader.result;
            });

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script src="./JS/EspacePatientJs.js"></script>





</body>

</html>