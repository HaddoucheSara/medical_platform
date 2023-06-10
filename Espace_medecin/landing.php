<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:formulaireconnexion.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>  
<html lang="en">
  <head>
    <title>Espace membre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		function updateDateTime() {
			var today = new Date();
			var date = today.toLocaleDateString('fr-FR');
			var time = today.toLocaleTimeString('fr-FR');
			$('#date').text(date); // Met à jour l'élément HTML avec l'ID "date" avec la nouvelle date
			$('#time').text(time); // Met à jour l'élément HTML avec l'ID "time" avec la nouvelle heure
		}

		setInterval(updateDateTime, 1000); // Met à jour la date et l'heure toutes les 1000ms (1 seconde)
    
	</script>



  </head>
  
  <style>
   .no-data-container {
   display: flex; 
   flex-direction: column; 
  align-items: center;
  justify-content: center;
  gap:100px;
  position:absolute;
  top:0;
 
padding-right:150px;
 
  
    } 
    .no-data-container img {
       position:center;
       position:absolute;  
      padding-right:200px; 
     /* padding-left:10px;  */
      top:0;
      
 
      
    } 
  
 *{font-family: 'Anuphan', sans-serif;
  font-family: 'Poppins', sans-serif;
  font-family: 'PT Sans', sans-serif;
  font-family: 'Roboto', sans-serif;
 }
 /* .text-center{
    display:flex;

 }
 .p-5{
   
    margin-top:0px;
    margin-left:200px;
    position:absolute;
 } */
 header{
  width:100%;
  display: flex;
  align-items: center;
  justify-content: space-between;

  top:0; left:0;
  z-index: 1000;
  padding:2rem;
  border-bottom:solid #CDEFFF;
  box-shadow: 0 5px 5px -5px #0a3d62;

}



header .navbar a{
  text-decoration: none;
  font-size: 14px;
padding-left:10px;
  padding:auto;
  border-radius: .5rem;
  color:var(--dark-blue);
  margin-right:1fr;
  
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
  font-size: 10px;
  color:var(--blue);
  cursor: pointer;
  display: none;
}
header .logo{
 margin-left:100px  ;

   

}
.container img{
  width: 370px;
  margin-left:330px;
  margin-top:110px;
 

}
.container h3 {
  font-size:20px;
  margin-left:2px;
  margin-top:20px;
  font-family: 'Anuphan', sans-serif;
  font-family: 'Poppins', sans-serif;
  font-family: 'PT Sans', sans-serif;
  font-family: 'Roboto', sans-serif;
}
.time{
  gap:10px;
  display:flex;
}
.card-body{
  height:auto; 

}

footer {
  background-color: #f8f8f8;
  padding: 50px 0;
  text-align: center;
 background-color:#CDEFFF;

  
}

p {
  font-size: 16px;
  margin-bottom: 5px;
}

.copyrigth {
  background-color: #e8e8e8;
  padding: 10px 0;
  margin-top: 20px;
}
.card-header{
  background-color:#0a3d62;
}


/* *,:after,:before{box-sizing:border-box} */
.pull-left{float:left}
.pull-right{float:right}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}

.calendar{width:300px;height:auto;font-size:100% ;perspective:1000px;cursor:default;position:relative}
.calendar .header{height:100px;position:relative;color:#fff}
.calendar .header .text{position:absolute;top:0;left:0;right:0;bottom:0;background-color:#308ff0;padding:15px;transform:rotateX(90deg);transform-origin:bottom;backface-visibility:hidden;transition:.4s ease-in-out 0s;box-shadow:0 6px 20px 0 rgba(0,0,0,.19), 0 8px 17px 0 rgba(0,0,0,.2);opacity:0}
.calendar .header .text>span{text-align:center;padding:26px;display:block}
.calendar .header.active .text{transform:rotateX(0deg);opacity:1}
.months{width:100%;height:280px;position:relative}
.months .hr{height:1px;margin:15px 0;background:#ccc}
.month{padding:15px;width:inherit;height:inherit;background:#fff;position:absolute;backface-visibility:hidden;transition:all .4s ease-in-out 0s;box-shadow:0 6px 20px 0 rgba(0,0,0,.19),0 8px 17px 0 rgba(0,0,0,.2)}
.months[data-flow="left"] .month{transform:rotateY(-180deg)}
.months[data-flow="right"] .month{transform:rotateY(180deg)}
.table{width:100%;font-size:10px;font-weight:400;display:table}
.table .row{display:table-row}
.table .row.head{color:#308ff0;text-transform:uppercase}
.table .row .cell{width:14.28%;padding:5px;text-align:center;display:table-cell}
.table .row .cell.disable{color:#ccc}
.table .row .cell span{display:block;width:28px;height:28px;line-height:28px;transition:color,background .4s ease-in-out 0s}
.table .row .cell.active span{color:#fff;background-color:#308ff0}
.months .month[data-active="true"]{transform:rotateY(0)}
.header [data-action]{color:inherit;position:absolute;top:50%;margin-top:-20px;width:40px;height:40px;z-index:1;opacity:0;transition:all .4s ease-in-out 0s}
.header [data-action]>i{width:20px;height:20px;display:block;position:absolute;left:50%;top:50%;margin-top:-10px;margin-left:-10px}
.header [data-action]>i:before,.header [data-action]>i:after{top:50%;margin-top:-1px;content:'';position:absolute;height:2px;width:20px;border-top:2px solid;border-radius:2px}
.header [data-action*="prev"]{left:15px}
.header [data-action*="next"]{right:15px}
.header [data-action*="prev"]>i:before,.header [data-action*="prev"]>i:after{left:0}
.header [data-action*="prev"]>i:before{top:3px;transform:rotate(-45deg)}
.header [data-action*="prev"]>i:after{top:auto;bottom:3px;transform:rotate(45deg)}
.header [data-action*="next"]>i:before,.header [data-action*="next"]>i:after{right:0}
.header [data-action*="next"]>i:before{top:auto;bottom:3px;transform:rotate(-45deg)}
.header [data-action*="next"]>i:after{top:3px;transform:rotate(45deg)}
.header.active [data-action]{opacity:1}

[data-theme="jan"]{background-color:#90CAF9}
[data-theme="jan"] .row.head{color:#1E88E5}
[data-theme="jan"] .header .text,
[data-theme="jan"] .table .row .cell.active span{background-color:#1E88E5}

[data-theme="feb"]{background-color:#81D4FA}
[data-theme="feb"] .row.head{color:#039BE5}
[data-theme="feb"] .header .text,
[data-theme="feb"] .table .row .cell.active span{background-color:#039BE5}

[data-theme="mar"]{background-color:#80CBC4}
[data-theme="mar"] .row.head{color:#00897B}
[data-theme="mar"] .header .text,
[data-theme="mar"] .table .row .cell.active span{background-color:#00897B}

[data-theme="apr"]{background-color:#C5E1A5}
[data-theme="apr"] .row.head{color:#7CB342}
[data-theme="apr"] .header .text,
[data-theme="apr"] .table .row .cell.active span{background-color:#7CB342}

[data-theme="may"]{background-color:#FFE082}
[data-theme="may"] .row.head{color:#FFB300}
[data-theme="may"] .header .text,
[data-theme="may"] .table .row .cell.active span{background-color:#FFB300}

[data-theme="jun"]{background-color:#FFAB91}
[data-theme="jun"] .row.head{color:#F4511E}
[data-theme="jun"] .header .text,
[data-theme="jun"] .table .row .cell.active span{background-color:#F4511E}

[data-theme="jul"]{background-color:#CE93D8}
[data-theme="jul"] .row.head{color:#8E24AA}
[data-theme="jul"] .header .text,
[data-theme="jul"] .table .row .cell.active span{background-color:#8E24AA}

[data-theme="aug"]{background-color:#B39DDB}
[data-theme="aug"] .row.head{color:#5E35B1}
[data-theme="aug"] .header .text,
[data-theme="aug"] .table .row .cell.active span{background-color:#5E35B1}

[data-theme="sep"]{background-color:#EF9A9A}
[data-theme="sep"] .row.head{color:#E53935}
[data-theme="sep"] .header .text,
[data-theme="sep"] .table .row .cell.active span{background-color:#E53935}

[data-theme="oct"]{background-color:#CE93D8}
[data-theme="oct"] .row.head{color:#8E24AA}
[data-theme="oct"] .header .text,
[data-theme="oct"] .table .row .cell.active span{background-color:#8E24AA}

[data-theme="nov"]{background-color:#BCAAA4}
[data-theme="nov"] .row.head{color:#6D4C41}
[data-theme="nov"] .header .text,
[data-theme="nov"] .table .row .cell.active span{background-color:#6D4C41}

[data-theme="dec"]{background-color:#B0BEC5}
[data-theme="dec"] .row.head{color:#546E7A}
[data-theme="dec"] .header .text,
[data-theme="dec"] .table .row .cell.active span{background-color:#546E7A}

.alert {

  width: 100%; /* la largeur est maintenant de 100% */
   /* ajuster la hauteur en fonction de la hauteur du header */
   display: flex;
  justify-content: center;
  align-items: center;

   
 }

 @media only screen and (max-width: 600px) {
    header {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .time {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      margin-bottom: 10px;
    }
    .logo {
      margin-bottom: 10px;
    }
    .navbar {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .btn {
      margin-bottom: 10px;
    }
    
   
  }
  @media screen and (max-width: 575px){
    .no-data-container{
  display:none;
}
  }
   @media screen and (max-width: 767px) {
  table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }
  th, td {
    display: inline-block;
    padding: 8px;
    text-align: left;
  }
  th {
    background-color: #3c6382;
    color: #fff;
    width: 120px;
  }
  td {
    width: 120px;
    border-bottom: 1px solid #ddd;
  }
  td:last-child {
    width: auto;
  }
  .btn-primary {
    font-size: 12px;
    padding: 4px 8px;
  }
 
  .no-data-container img {
    width: 370px;
  margin-left:250px;
  margin-top:110px;
}



}

.card-body {
  overflow-x: auto;
}




  </style>



  <body style="background-color:#CDEFFF">
  

  
<header>
  <div class="time">
<p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg> <i class="bi bi-calendar"></i></p><span style="margin-top:4px"id="date"></span>
		<p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
</svg><i class="bi bi-alarm"></i></p></i><span  style="margin-top:4px" id="time"></span>
</div>
    <img src="../Assets/Images/LOGO_medecin.png" class="logo" width="70px" height="70px"/>
    <div id="menu" class="fas fa-bars">
        
    </div>
  
    <nav class="navbar">
        
    <a href="./deconnexion.php" class="btn btn-danger btn-lg"style="height:40px;width:100px;background-color:#0a3d62;color:#ffff; ">Déconnexion</a>
                        <!-- Button trigger modal -->
    <a href="#" style="height:40px;width:180px; margin-left:2px;background-color:#0a3d62;color:#ffff " type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#change_password">
                          Changer mot de passe
</a>
       
  
        
        
    </nav>
    
  </header>
        <div class="container">

            <div class="col-md-12">
                <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div style=\"width:100%\" class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>

<div class="row">
    <div class="col-md-12">
                <div class="text-center">
                        <h1 class="p-3 p-md-5">Bienvenue  Docteur <?php echo strtoupper($data['Nom_Prenom']); ?> !</h1>
                       
                </div>
                <div class="d-flex justify-content-center">
                <img style="width: 370px; margin-left:0px;margin-top:0px"src="../Assets/Images/photo9-removebg-preview.png"/>
                </div>
    </div>
  </div>
</div>
            <h3> Voici ce qui est prévu pour aujourd’hui :</h3>

<div class="card-deck" style="margin-top:40px; ">

<div class="card">
  <div class="card-header">
    <svg xmlns="http://www.w3.org/2000/svg" color="#ffff" ;width="20" height="20" fill="currentColor" class="bi bi-calendar-heart" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5ZM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1Zm7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
    </svg>
    <i style="color:#ffff; margin-right:20px"class="bi bi-calendar-heart">liste des <strong>Rendez-vous.</strong></i>
  </div>

  <div class="card-body">
  <?php
      // Connexion à la base de données
      $conn = mysqli_connect("localhost", "root", "root", "trial");
      
      // Vérification de la connexion
      // if (!$conn) {
      //     die("Connection failed: " . mysqli_connect_error());
      // }
      
      // Requête pour récupérer les rendez-vous de la base de données
      $sql = "SELECT * FROM info_rendez";
      $result = mysqli_query($conn, $sql);
      
      // Vérification s'il y a des rendez-vous dans la base de données
      if (mysqli_num_rows($result) > 0) {
          // Affichage de la liste des rendez-vous
          echo "<h3> <strong>Vos rendez-vous:</strong></h3> ";
          echo "<style>";
          echo "table { border-collapse: collapse; width: 100%;font-size:10px}";
          echo "th, td { border: 1px solid black; padding: 8px; text-align: left; }";
          echo "tr:nth-child(even) { background-color: #f2f2f2; }";
          echo "</style>";
          
          echo "<table>";
          echo "<thead style=\"background-color:#3c6382\";><tr><th>Nom</th><th>Prenom</th><th>Date</th><th>Heure</th></tr></thead>";
          echo "<tbody>";
          
          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["nom"] . "</td>";
              echo "<td>" . $row["prenom"] . "</td>";
              echo "<td>" . $row["datee"] . "</td>";
              echo "<td>" . $row["heuree"] . "</td>";
              echo "</tr>";
          }
          
          echo "</tbody>";
          echo "</table>";
          


        
      } else {
          // Aucun rendez-vous trouvé dans la base de données
          
          echo '<div class="no-data-container ">';
          echo '<img src="./Assets/images/no-results-bg.2d2c6ee3-removebg-preview.png"/>';
         echo' <i class="bi bi-database-fill-exclamation"></i>';
          echo '<p style="padding-top:200px;font-size:100%;text-align:center;padding-left:px">Aucun rendez-vous n\'est pris pour le moment!</p>'
       ;
 
          
          echo '</div>';
      }
      
      // Fermeture de la connexion à la base de données
      mysqli_close($conn);
    ?>
  </div>
</div>



  <div class="card">
    <div class="card-header">
    <svg xmlns="http://www.w3.org/2000/svg"color="#ffff" width="25" height="25" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
</svg>
    <i style="color:#ffff;margin-right:20px"class="bi bi-person-lines-fill">liste des <strong>Patients.</strong></i>
    </div>
    <div class="card-body" id="cards" >
    <?php
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "trial"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

// if (!$conn) {
//   die("La connexion a échoué: " . mysqli_connect_error());
// }

$sql = "SELECT * FROM dossiers_medicaux";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<h3> <strong>Vos Patients:</strong></h3> ";
 echo '<div class="table-responsive">';
 echo  '<table class="table">';
 echo    '<thead style=\"background-color:#3c6382\";>';
 echo     ' <tr>';
 echo      '<th>Nom</th>';
 echo     ' <th>Prénom</th>';
 echo      '  <th>Dossier médical</th>';
 echo     ' </tr>';
 echo  ' </thead>';
 echo  ' <tbody>';
      
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["prenom"] . "</td>";
        echo "<td><a style=\"background-color:#3c6382;font-size:10px;\" class='btn btn-primary' href='dossier_medical.php?id=" . $row["id"] . "'>Consulter le dossier médical</a></td>";
        echo "</tr>";
      }
     
      echo '  </tbody>';
      echo  '</table>';
      echo' </div>';

}


else {
  echo '<div class="no-data-container">';
  echo '<img src="./Assets/images/no-results-bg.2d2c6ee3-removebg-preview.png"/>';
 echo' <i class="bi bi-database-fill-exclamation"></i>';
  echo '<p style="padding-top:200px;font-size:100%;text-align:center;padding-left:px">Aucun Patient n\'est encore inscrit!</p>'
;

  
  echo '</div>';
}

mysqli_close($conn);
?>
    </div>
  </div>

  
  <div class="card">
    <div class="card-header">
    <svg xmlns="http://www.w3.org/2000/svg" color="#ffff"width="20" height="20" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
    </svg>
    <i style="color:#ffff;margin-right:20px" class="bi bi-calendar-check"><strong>Agenda</strong> 2023.</i>
    </div>
    <div class="card-body">
    <div class="calendar" >
  <div class="header">
    <a data-action="prev-month" href="javascript:void(0)" title="Previous Month"><i></i></a>
    <div class="text" data-render="month-year"></div>
    <a data-action="next-month" href="javascript:void(0)" title="Next Month"><i></i></a>
  </div>
  <div class="months" data-flow="left">
    <div class="month month-a">
      <div class="render render-a"></div>
    </div>
    <div class="month month-b">
      <div class="render render-b"></div>
    </div>
  </div>
</div>
</div>
</div>
                      </div>
        
      
       
        
   <footer > 
    <div class="copyright">
      <p>&copy; 2023 MonSite. Tous droits réservés.</p>
    </div>
   </footer>   
   

                                
        <!-- Modal -->
        <div style="background-color:#3c6382"class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div style="background-color:#CDEFFF" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size:30px">Changer mon mot de passe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="./change_password.php" method="POST">
                                    <label for='current_password'>Mot de passe actuel:</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password'>Nouveau mot de passe:</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password_retype'>Re tapez le nouveau mot de passe:</label>
                                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

            
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js2.js"></script>
  </body>
</html>