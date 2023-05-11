<?php
require_once '../Controller/commentaireC.php';
require_once '../Model/commentaire.php';

$error = "";


// create an instance of the controller
$commentaireC = new commentaireC();
if (isset($_POST["button"])) {
    if (!empty($_POST['contenu'])) {
        $commentaire = new Commentaire(
            null,
            $_POST['contenu'],$_POST['id']
        );
        $commentaireC = new commentaireC();
        $commentaireC->modifieravis($_POST['id'],$_POST['note']);


        // add the comment
        $commentaireC->addCommentaire($commentaire);
        header('Location: join_postcom.php'); // redirect to the comments page
        exit;
    } else {
        $error = "Missing information";
    }
}
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
        <a href="" class="logo"><img src="image/logo.png" width="50px"></a>
        <nav class="navbar">
            <a href="#Home" style="--i:1;" class="active">Home</a>
            <a href="#About"style="--i:2;">About</a>
            <a href="searchPost.php"style="--i:3;">Post</a>
            <a href="#Compte"style="--i:4;">Compte</a>
            
        </nav>
        <div class="bx bx-moon" id="dark-icon"></div>
       </header> 
       <!--post section-->
       <section class="home" id="Home"> 
        <div class="offre-container">
           <div class="overlay"></div>
        </div>
        
	<div class="container">
		<div id="error">
			<?php echo $error; ?>
		</div>
		<form action="add_commentaire.php" method="POST">
			<table border="2">
				<tr>

					<td>                <h2>Add a Comment</h2>
<input type="textarea" name="contenu" id="contenu" required></td>
				</tr>
				<tr>

					<td style="display:none;">                <h2>id poste</h2>
<input type="number" name="id" id="id" value="<?php echo $_GET['id'];?>"required></td>
				</tr>
                <br>
                <div class="stars">

<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

   <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star" data-value="3"></i><i class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
</div>
<input type="hidden" name="note" id="note" value="0">

<br>

				<tr>
					<td colspan="2"><input type="submit" name="button" id="button" value="Add Comment"></td>
				</tr>
			</table>
		</form>
        <br><br>
 
	</div>


    

       
        
    </section>




    <footer class="footer">
    <div class="footer-text">
        <p>Copyright &copy;;2023 by SWEAT SOCIETY</p>
    </div>
    <div class="footer-icontop">
        <a href="#Home"><i class="bx bx-up-arrow-alt"></i></a>
    </div>
</footer>
<script >
         window.onload = () => {
    // On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".la-star");
    
    // On va chercher l'input
    const note = document.querySelector("#note");

    // On boucle sur les étoiles pour le ajouter des écouteurs d'évènements
    for(star of stars){
        // On écoute le survol
        star.addEventListener("mouseover", function(){
            resetStars();
            this.style.color = "red";
            this.classList.add("las");
            this.classList.remove("lar");
            // L'élément précédent dans le DOM (de même niveau, balise soeur)
            let previousStar = this.previousElementSibling;

            while(previousStar){
                // On passe l'étoile qui précède en rouge
                previousStar.style.color = "red";
                previousStar.classList.add("las");
                previousStar.classList.remove("lar");
                // On récupère l'étoile qui la précède
                previousStar = previousStar.previousElementSibling;
            }
        });

        // On écoute le clic
        star.addEventListener("click", function(){
            note.value = this.dataset.value;
        });

        star.addEventListener("mouseout", function(){
            resetStars(note.value);
        });
    }

    /**
     * Reset des étoiles en vérifiant la note dans l'input caché
     * @param {number} note 
     */
    function resetStars(note = 0){
        for(star of stars){
            if(star.dataset.value > note){
                star.style.color = "black";
                star.classList.add("lar");
                star.classList.remove("las");
            }else{
                star.style.color = "red";
                star.classList.add("las");
                star.classList.remove("lar");
            }
        }
    }
}
</script>

    </body>
</html>