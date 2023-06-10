<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$Nom = $Prenom = $Email = $password = $confirm_password = "";
$nom_err = $prenom_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate nom

    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE Nom = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_nom);

        // Set parameters
        $param_nom = trim($_POST["Nom"]); //name de l'input dans form

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            /* store result */
            mysqli_stmt_store_result($stmt);


            $Nom = trim($_POST["Nom"]);
        } else {
            echo "Erreur : Veuillez réessayer ";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Validate prenom
    if (empty(trim($_POST["Prenom"]))) {
        $prenom_err = "Veuillez saisir votre prénom";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE Prenom = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_prenom);

            // Set parameters
            $param_prenom = trim($_POST["Prenom"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);



                $Prenom = trim($_POST["Prenom"]);
            } else {
                echo "Erreur : Veuillez réessayer ";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Validate Email
    if (empty(trim($_POST["Email"]))) {
        $email_err = "Veuillez saisir votre email";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE Email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["Email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);



                $Email = trim($_POST["Email"]);
            } else {
                echo "Erreur : Veuillez réessayer ";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($nom_err) && empty($prenom_err)  && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (Nom , Prenom , Email , password) VALUES (?, ?, ? , ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_nom, $param_prenom, $param_email, $param_password);

            // Set parameters
            $param_nom = $Nom;
            $param_prenom = $Prenom;
            $param_email = $Email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: Connexion.php");
            } else {
                echo "Oops! Erreur .";
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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <title>Inscription</title>
    <style>
        form {
            height: 600px;
        }



        @media (max-width:547px) {
            form {
                width: 400px;
                margin-top: 0px;
                margin-bottom: 0px;
            }
        }
    </style>
</head>

<body>
    <div class="overlay">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!--   con = Container  for items in the form-->
            <div class="con">
                <!--     Start  header Content  -->
                <header class="head-form">
                    <h2>Inscription</h2>

                </header>
                <!--     End  header Content  -->
                <br>
                <div class="field-set">
                    <!--   user name -->
                    <!--   user name Input-->
                    <input class="form-input" name="Nom" type="text" placeholder="Nom" required class="form-control <?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Nom; ?>">
                    <input class="form-input" name="Prenom" type="text" placeholder="Prénom" class="form-control <?php echo (!empty($prenom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Prenom; ?>" required>
                    <input class="form-input" name="Email" type="email" placeholder="Adresse email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Email; ?>" required>

                    <br>
                    <input class="form-input" type="password" placeholder="Mot de passe" id="pwd" name="password" required>
                    <input type="password" name="confirm_password" class="form-input" placeholder="Re-tapez le mot de passe" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" required="required" autocomplete="off">
                    <br>
                    <!--        buttons -->
                    <!--      button LogIn -->
                    <button type="submit" class="log-in">S'inscrire</button>
                </div>

                <!--   other buttons -->






                <!--   End Conrainer  -->
            </div>

            <!-- End Form -->
        </form>
    </div>
</body>

</html>