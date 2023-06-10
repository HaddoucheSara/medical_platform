<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: EspacePatient.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$Nom = $Prenom = $Email = $password = $confirm_password = "";
$nom_err = $prenom_err = $email_err = $password_err = $confirm_password_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if nom is empty
    if (empty(trim($_POST["Nom"]))) {
        $nom_err = "Veuillez saisir votre nom";
    } else {
        $Nom = trim($_POST["Nom"]);
    }

    // Check if prenom is empty
    if (empty(trim($_POST["Prenom"]))) {
        $prenom_err = "Veuillez saisir votre nom";
    } else {
        $Prenom = trim($_POST["Prenom"]);
    }

    // Check if email is empty
    if (empty(trim($_POST["Email"]))) {
        $email_err = "Veuillez saisir votre email";
    } else {
        $Email = trim($_POST["Email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    

    // Validate credentials
    if (empty($nom_err) && empty($prenom_err) && empty($email_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, Nom , Prenom ,Email , password FROM users WHERE Nom = ? && Prenom = ?  && Email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nom, $param_prenom, $param_email);

            // Set parameters
            $param_nom = $Nom;
            $param_prenom = $Prenom;
            $param_email = $Email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $Nom, $Prenom, $Email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Redirect user to EspacePatient
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["Nom"] = $Nom;
                            $_SESSION["Prenom"] = $Prenom;
                            $_SESSION["Email"] = $Email;
                            header("location: EspacePatient.php");
                            exit();
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Nom , prénom ou mot de passe invalide ";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Nom , prénom ou mot de passe invalide";
                }
            } else {
                echo "Oops! Erreur ";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/StylesConnexion.css">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <title>Connexion</title>
    <style>
         .alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}

    .alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
        .field-set {
            width: 400px;
            height: 400px;

            justify-content: center;
        }

        form {
            height: 650px;
        }

        form .head-form{
            margin-bottom: 0px;
        }

        .head-form h2{
            margin-bottom: 10px;
        }


        @media (max-width:547px){
            form{
                width:400px; 
                margin-top: 0px;
                margin-bottom: 0px;
            }
        }

   
    </style>
</head>

<body>
    <div class="overlay">
        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!--   con = Container  for items in the form-->
            <div class="con">
                <!--     Start  header Content  -->
                <header class="head-form">
                    <h2>Connexion</h2>

                    <!--     A welcome message or an explanation of the login form -->
                    <p>Connectez vous en utilisant votre adresse email et mot de passe à votre espace patient </p>
                </header>
                <!--     End  header Content  -->
                <br>
                <div class="field-set">
                    <input class="form-input" name="Nom" type="text" placeholder="Nom" required>
                    <input class="form-input" name="Prenom" type="text" placeholder="Prénom" class="form-control <?php echo (!empty($prenom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Prenom; ?>">
                    <input class="form-input" name="Email" id="email" type="email" placeholder="Adresse email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Email; ?>" required>
                    <input class="form-input" name="password" type="password" placeholder="Mot de passe" id="pwd" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" required>
                    <br>
                    <!--        buttons -->
                    <!--      button LogIn -->
                    <button class="log-in" type="submit">Se connecter </button>

                </div>


                <div class="inscription">
                    <p>Vous n'avez pas encore de compte ?</p>
                    <button class="sign-up" type="button" onclick="window.location.href='./Inscription.php'">S'inscrire</button>
                </div>



                <!--   End Container  -->
            </div>

            <!-- End Form -->
        </form>
    </div>
    <!-- <script src="./JS/ConnexionJS.js"></script> -->
</body>

</html>