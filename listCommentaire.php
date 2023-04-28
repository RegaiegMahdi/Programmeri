
<?php
require_once '../Controller/commentaireC.php';
require_once '../Model/commentaire.php';
var_dump($_POST);


// Create an instance of the controller
$commentaireC = new commentaireC();

// Get all products
$commentaires = $commentaireC->getComment();

?>
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
        

       
        <table class="list">
        <?php if (count($commentaires) > 0): ?>
            <thead>
                <tr>
                    <th>Contenu</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
                <?php foreach ($commentaires as $commentaire): ?>
                  <tbody>  
                    <tr>
                        <td><?= $commentaire->getContenu_c() ?></td>
                        
                        <td align="center">
                        <form method="POST" action="updateCommentaire.php">
						
    <input type="hidden" name="id" value="<?= $commentaire->getId_c() ?>">
    <input type="submit" name="update" value="Update">
    
     
	
</form>

<td>
<a href="deleteCommentaire.php?id=<?php echo $commentaire->getId_c(); ?>">Delete</a>

                </td>

                        </td>
                        <td>
						<td>
						
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                  </tbody>
            </table>
        <?php else: ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
    

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


<?php





