<?php
include "../Controller/ReservationC.php";
$ReservationC = new ReservationC();
$list = $ReservationC->listeReservation();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>SWEAT SOCIETY</title>
        <!--navbar icon-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="style2.css">
        <script src="C:\xampp\htdocs\scriptphp\projet\view\script.js"></script>
    </head>
    <body>
       <header class="header">
        <a href="" class="logo"><img src="C:/xampp/htdocs/scriptphp/projet/view/image/logo.png" width="50px"></a>
        <nav class="navbar">
        <a href="index2.php" style="--i:1;" class="active">Home</a>
            <a href="#About"style="--i:2;">About</a>
            <a href="#Contact"style="--i:3;">Contact</a>
            <a href="profile.php"style="--i:4;">Compte</a>
            <a href="listReclamation.php"style="--i:3;">Réclamation</a>
            <a href="listCours.php"style="--i:4;">Cours</a>
            <a href="gestionreservation.php"style="--i:4;">Reservation</a>
            <a href="filtration.php"style="--i:4;">Commentaire</a>
            <a href="searchPost.php"style="--i:4;">Post</a>
            <a href="listproduit2.php" class="btn">Commande</a>
            <a href="http://localhost/qr/chatbot%20-%20php%20&%20ajax/chatbot%20-%20php%20&%20ajax/bot.php" class="btn">Chat</a>
            <a href="login.php"style="--i:4;">Log out</a>
            
        </nav>
        <div class="bx bx-moon" id="dark-icon"></div>
       </header> 
       <!--home section-->
       <section class="home" id="Home">
        <div class="offre-container">
          <div class="overlay"></div>

          
        </div>
        <section class="List">

<div class="InputlistAdd slide-in-right">
    
    <form  class="form-group" method="POST" action="addReservation.php">
        
<ul>
<li>
    <h1>Gestion Reservation</h1>


    <h3> Ajouter</h3>

<br>
<br>
            <td>
            <td>
                   
                    <label for="dateeadd"> 
                        <label>
                            <select name="dateeadd">
                                <option value="1">Salle 1</option>
                                <option value="2">Salle 2</option>
                                <option value="3">Salle 3</option>
</select>
<br>
<br>
            <li>
                <label for="idClientadd">
                    <label>
                        <input type="number" name="idClientadd" placeholder="entrer votre ID" id="idClientadd" required
                        minlength="9999999" max="10000000" size="10000000">
            </li>
            <li>
<br>

            <input type="submit" name="Add" value="Submit" class="btn mt-4">
        </tr>
      

    </div>
                    
    <div class="InputlistEdit slide-out-right">

<form  class="form-group" method="POST" action="updateReservation.php">
    
    <ul>
        <li>
            <h3>Modifier</h3>
            </li>
   
        <li>
            <label for="dateeup">
                <label>
                    <select name="dateeup">
                        <option value="1">Salle 1</option>
                        <option value="2">Salle 2</option>
                        <option value="3">Salle 3</option>
</select>
<li>
            <label for="idClientup">
                <label>
                    <input type="number" name="idClientup" placeholder="entrer votre ID" id="idClientadd" 
                    minlength="1" maxlength="6" size="1">
        </li>
    <input type="submit" name="Update" value="Submit" class="btn mt-4">
  
</section>
    </section>
    


    <footer class="footer">
    <div class="footer-text">
        <p>Copyright &copy;;2023 by SWEAT SOCIETY</p>
    </div>
    <div class="footer-icontop">
        <a href="#Home"><i class="bx bx-up-arrow-alt"></i></a>
    </div>
</footer>

    </body>
</html>