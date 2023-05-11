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
        <script src="./script.js"></script>
    </head>
    <body>
       <header class="header">
        <a href="" class="logo"><img src="logo.png" width="50px"></a>
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
        <div class="home-content">
          
		<?php
include "../Controller/ReclamationC.php";
$ReclamationC = new ReclamationC();
$list = $ReclamationC->listReclamation();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Programmeri </title>
 

</head>
<body>
	  <!--! Table or list ============================================== -->
	<section class="List">
	
		<div class="InputlistAdd slide-in-right">

			<form  class="form-group" method="POST" action="addReclamation.php">
				
				<ul>
					<li>
						<h3> Ajouter</h3><br><br>
					</li>
					
					<li>
						<input type="text" name="idClientadd" class="form-style" placeholder="Id Client" id="idClientadd" autocomplete="off" required>
						<i class="input-icon uil uil-box"></i>
					</li>
					<li>
						<input type="text" name="Emailadd" class="form-style" placeholder="email client" id="Emailadd" autocomplete="off">
						<i class="input-icon uil uil-usd-circle"></i>
					</li>
					<li>
						<input type="text" name="Sujetadd" class="form-style" placeholder="sujet de la réclamation" id="Sujetadd" autocomplete="off">
						<i class="input-icon uil uil-tag"></i>
					</li>
					<li>
						<input type="text" name="Messageadd" class="form-style" placeholder=" message de la réclamation" id="Messageadd" autocomplete="off">
						<i class="input-icon uil uil-home"></i>
					</li>
	                <li>
					  <select id="Statutadd" name="Statutadd" style="display: none" >
                        <option value="En_attente">En attente</option>
                        <option value="En_cours_de_traitement">En cours de traitement</option>
                        <option value="Résolue">Résolue</option>
                       </select>
					</li>
					
					
				</ul>
				<input type="submit" name="Add" value="Submit" class="btn mt-4"><br><br>
			</form>

		</div>
		<div class="InputlistEdit slide-out-right">

			<form  class="form-group" method="POST" action="updateReclamation.php">
				
				<ul>
					<li>
						<h3>Modifier</h3><br><br>
					</li>
					<li>
						<input type="text" name="idrup" class="form-style" placeholder="Id de la Reclamation à Modifier" id="idrup" autocomplete="off">
						<i class="input-icon uil uil-parcel"></i>
					</li>
					<li>
						<input type="text" name="idClientup" class="form-style" placeholder="Id Client" id="idClientadd" autocomplete="off">
						<i class="input-icon uil uil-box"></i>
					</li>
					<li>
						<input type="text" name="Emailup" class="form-style" placeholder="email client" id="Emailadd" autocomplete="off">
						<i class="input-icon uil uil-usd-email"></i>
					</li>
					<li>
						<input type="text" name="Sujetup" class="form-style" placeholder="sujet de la réclamation" id="Sujetadd" autocomplete="off">
						<i class="input-icon uil uil-tag"></i>
					</li>
					<li>
						<input type="text" name="Messageup" class="form-style" placeholder=" message de la réclamation" id="Messageadd" autocomplete="off">
						<i class="input-icon uil uil-text"></i>
						
					</li>
					<li>
					  <select id="Statutup" name="Statutup" style="display: none">
                        <option value="En_attente">En attente</option>
                        <option value="En_cours_de_traitement">En cours de traitement</option>
                        <option value="Résolue">Résolue</option>
                       </select>
					</li>
				</ul>
				<input type="submit" name="Update" value="Submit" class="btn mt-4">
			</form>

		</div>
	</section>

	<!--! Scroll back to top ================================================== -->
	<div class="scroll-to-top"></div>

    
</body>

</html>


        </div>  
        <div class="offre-container">
            <div class="offre-box">
                <div class="offre" style="--i:0;">
                    <i class='bx bx-wind'></i>
                    <h3>Cours Yoga</h3>
                </div>
                <div class="offre" style="--i:1;">
                    <i class='bx bxs-hand'></i>
                    <h3>Cours Box</h3>
                </div>
                <div class="offre" style="--i:2;">
                    <i class='bx bx-run'></i>
                    <h3>Séance Cardio</h3>
                </div>
                <div class="offre" style="--i:3;">
                    <i class='bx bx-dumbbell'></i>
                    <h3>Musculation</h3>
                </div>
                <div class="circle"></div>
            </div>
            <div class="overlay"></div>
        </div>
        <div class="home-img">
            <img src="img2.png">
        </div>
    </section>
    <!--about section-->
    <section class="about" id="#About">
        <div class="slider" id="slider">
            <div class="slides">
                <!--radio button start-->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <!--radio button end-->
                <!--slides img start-->
                <div class="slide first">
                    <img src="images-slide1.jpeg">
                </div>
                <div class="slide">
                    <img src="images-slide2.jpeg">
                </div>
                <div class="slide">
                    <img src="images-slide3.jpeg">
                </div>
                <div class="slide">
                    <img src="images-slide4.jpeg">
                </div>
                <!--slide img end-->
            </div>
                <!--navigation manu start-->
                <div class="navigation-manu">
                    <label for="radio1" class="manu-btn"></label>
                    <label for="radio2" class="manu-btn"></label>
                    <label for="radio3" class="manu-btn"></label>
                    <label for="radio4" class="manu-btn"></label>

                </div>
                <!--navigation manu end-->
            </div>
            <div class="about-content">
                <h2 class="heading">ABOUT <span> US</span></h2>
                <br>
                <h3 Hi, we are here to help you></h3>
                <br>
                <p>Sweat Society est située dans le centre-ville,
                    la salle de sport dispose d'équipements <br>de pointe tels que des machines cardiovasculaires,
                    des poids libres,<br> des TRX et des tapis de yoga pour s'adapter aux besoins de tous les types d'entraînement.
                </p>
            </div>
    </section>
    <div class="pos">
        <h2>Voila notre Position </h2>
    </div>
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6381.123428499425!2d10.181477623539365!3d36.90083199932595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cb763f2120bb%3A0xc3e79593db50c2e8!2sLa%20petite%20Ariana%2C%20Cebalat%20Ben%20Ammar!5e0!3m2!1sfr!2stn!4v1679586947524!5m2!1sfr!2stn" width="1348" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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