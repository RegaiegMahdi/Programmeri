<?php
include '../Controller/commentaireC.php';
// Appel de la fonction pour récupérer les résultats de la jointure
require_once '../config.php';
require_once '../Model/commentaire.php';

$commentaireC = new CommentaireC(); // Create an instance of the CommentaireC class
$results = $commentaireC->joinTables(); // Call the joinTables() function

// Output the results


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
           
        </div>
        
        <h1>Posts and Comments</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Post Content</th>
                <th>Image</th>
                <th>Subjet</th>
                <th>Commentaire</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['contenu'] ?></td>
            <td><img src="<?= $row['image'] ?>"></td> 
            <td><?= $row['sujet'] ?></td>
            <td><?= $row['contenu_c'] ?></td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>

    <form action="listCommentaire.php">
    <button>modifier et Supprimer un Commentaire</button>
</form>

       
        
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










