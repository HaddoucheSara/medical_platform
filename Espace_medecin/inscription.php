<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
            <link href="./styleinscription.css" rel="stylesheet" >
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body style="background-color:#ffff "> 
        <style>
            body{
                 background-image: url('../Assets/Images/CONNEXION_BG.png');
        background-size: cover;
        background-position: center;}
        form {
    width: 450px; 
    min-height: 500px;
    height: auto;
    border-radius: 0px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 2%;
    background-image: linear-gradient(-225deg, #CDEFFF 50%, #CDEFFF 50%);
   margin-top: 50px;
}
        </style>
        <div class="overlay">
            <?php 
                if(isset($_GET['reg_err']))  
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                             
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent!
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide!
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long!
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Nom et  prénom  trop long!!
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant!
                            </div>
                        <?php 

                    }
                }
              
                ?>
          
            <form action="inscription_traitement.php" method="post">
            <div class="con">
   <!--     Start  header Content  -->
   <header class="head-form">
      <h2 style=" font-family: 'Anuphan', sans-serif;
  font-family: 'Poppins', sans-serif;
  font-family: 'PT Sans', sans-serif;
  font-family: 'Roboto', sans-serif; font-size:50px;color:#3c6382"><strong>Inscription</strong></h2>
      <!--     A welcome message or an explanation of the login form -->

   </header>
   <!--     End  header Content  -->
   <br>
   <div class="field-set">
    
  
                    <input type="text" name="Nom_Prenom" class="form-input" placeholder="Nom et Prénom " required="required" autocomplete="off">
            
                <br>
              
                    <input type="email" name="email" class="form-input" placeholder="Email" required="required" autocomplete="off">
               
                <br>
              
                    <input type="password" name="password" class="form-input" placeholder="Mot de passe" required="required" autocomplete="off">
               
                <br>
               
                    <input type="password" name="password_retype" class="form-input" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
             
                <br>
            
                    <button style="  background-color: #3c6382;margin-top:40px"type="submit" class="btn btn-primary btn-block">Inscription</button>
                
                <br>  
        
            </div>
            </div>
    

    
  
  


</form>
</div>
</body>
</html>



