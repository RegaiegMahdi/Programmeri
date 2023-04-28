<?php
require_once '../Controller/commentaireC.php';
require_once '../Model/commentaire.php';

$error = "";

$commentaire = null;

// create an instance of the controller
$commentaireC = new commentaireC();

if (isset($_POST["contenu"])) {
    if (!empty($_POST['contenu'])) {
        $commentaire = new Commentaire(
            null,
            $_POST['contenu']
        );

        // add the comment
        $commentaireC->addCommentaire($commentaire);
        header('Location: listCommentaires.php'); // redirect to the comments page
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
        <a href="" class="logo"><img src="C:/xampp/htdocs/scriptphp/projet/view/image/logo.png" width="50px"></a>
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
		<h2>Add a Comment</h2>
		<div id="error">
			<?php echo $error; ?>
		</div>
		<form action="add_commentaire.php" method="POST">
			<table border="1">
				<tr>
					
					<td><input type="textarea" name="contenu" id="contenu" required></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Add Comment"></td>
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

    </body>
</html>