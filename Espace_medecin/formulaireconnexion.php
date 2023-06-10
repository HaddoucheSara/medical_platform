<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
            <link rel="preconnect" href="https://fonts.googleapis.com">
           <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@500&family=PT+Sans:ital@0;1&family=Poppins:ital,wght@0,100;1,100;1,200&family=Roboto:wght@300&display=swap" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link href="./stylelogin.css" rel="stylesheet" >
            <title>Connexion</title>
        </head>
        <style>
            body{
                background-image: url('../Assets/images/CONNEXION_BG.png');
        background-size: cover;
        background-position: center;
            }
         /* Start form  attributes */
form {
    width: 450px; 
    min-height: 500px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 2%;
     background-image: linear-gradient(-225deg, #CDEFFF 50%, #CDEFFF 50%); 
   margin-top: 50px;
}

        </style>
        <body style="background-color:#ffff">
        
      
            
            <div class="overlay">
            <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            

<form action="./connexion.php" method="post">
   <!--   con = Container  for items in the form-->
   <div class="con">
   <!--     Start  header Content  -->
   <header class="head-form">
      <h2 style=" font-family: 'Anuphan', sans-serif;
  font-family: 'Poppins', sans-serif;
  font-family: 'PT Sans', sans-serif;
  font-family: 'Roboto', sans-serif; font-size:50px;color:#3c6382"><strong>Connexion</strong></h2>
      <!--     A welcome message or an explanation of the login form -->

   </header>
   <!--     End  header Content  -->
   <br>
   <div class="field-set">
     
      <!--   user name -->
         <span class="input-item">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
         <i class="bi bi-person-circle"></i>
         </span>
        <!--   user name Input-->
         <input class="form-input" id="txt-input" type="email" placeholder="Email" name="email" required>
     
      <br>
     
           <!--   Password -->
     
      <span class="input-item">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
      <i class="bi bi-key"></i>
       </span>
      <!--   Password Input-->
      <input class="form-input" type="password" placeholder="Mot de passe" id="pwd"  name="password" required>
     
<!--      Show/hide password  -->
   
     
     
      <br>
<!--        buttons -->
<!--      button LogIn -->
      <button class="log-in" style="background-color:#3c6382;color:#ffff"> Connexion</button>
   </div>
  

<!--     Sign Up button -->
      <button class="btn submits sign-up"> <a href="./inscription.php">Inscription</a>
<!--         Sign Up font icon -->
<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
</svg>
       <i class="bi bi-person-fill-add" aria-hidden="true"></i>
      </button>
<!--      End Other the Division -->
 
     
<!--   End Conrainer  -->
  </div>
  
  <!-- End Form -->
</form>
</div>
        
   


<script src="./js1.js"></script>
        </body>
        
</html>
 



