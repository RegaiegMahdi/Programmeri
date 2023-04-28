<?php



var_dump($_POST);
// Include the controller and prost class
include '../Controller/postC.php';

// Create an instance of the controller
$postC = new postC();

// Get all products
$posts = $postC->getPost();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>SWEAT SOCIETY</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="style_back_listPost.css">
    </head>
    <body>
        <div class="container">
            <aside>
                <div class="top">
                    <div class="logo">
                        <img src="C:\xampp\htdocs\scriptphp\projet\image\logo.png">
                        <h2>SW<span class="title">EAT</span> SOCIETY</h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">close</span>
                    </div>
                </div>
                <div class="sidebar">
                    <a href="#" class="active">
                        <span class="material-icons-sharp">person</span>
                        <h3>Utilisateur</h3>
                    </a>
                    <a href="#" class="active">
                        <span class="material-icons-sharp">chat</span>
                        <h3>Reclamation</h3>
                    </a>
                    <a href="#"class="active">
                        <span class="material-icons-sharp">rate_review</span>
                        <h3>Reponse</h3>
                    </a>
                    <a href="#"class="active">
                         <span class="material-icons-sharp"> production_quantity_limits  </span>
                         <h3>Produit</h3>
                    </a>
                    <a href="#"class="active">
                        <span class="material-icons-sharp">list_alt</span>
                        <h3>Commande</h3>
                    </a>
                    <a href="#"class="active">
                        <span class="material-icons-sharp">pages</span>
                        <h3>Post</h3>
                    </a>
                    <a href="#"class="active">
                        <span class="material-icons-sharp">comment</span>
                        <h3>Commentaire</h3>
                    </a>
                    <a href="#"class="active">
                        <span class="material-icons-sharp">fitness_center</span>
                        <h3>Cours</h3>
                    </a>
                    <a href="#"class="active">
                        <span class="material-icons-sharp">book_online</span>
                        <h3>Reservation</h3>
                    </a>
                </div>
            </aside>
            <right>
                <div class="right">
                    <div class="top">
                        <button id="menu-btn">
                            <span class="material-icons-sharp ">menu</span>
                        </button>
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active"> light_mode</span>
                            <span class="material-icons-sharp" >dark_mode</span>
                        </div>
                    </div>
         </div>

         <section id="blog">
         <?php if (count($posts) > 0): ?>
            <?php foreach ($posts as $post): ?>
            <div class="blog-heading">
                <span> Recent Posts</span>
                <h3>Our blog</h3>
            </div>

            <div class="blog-container">
                 <!--box1-->
                 <div class="blog-box">
                <!--img-->
                <div class="blog-img">
                <td><img class="product-image" src="uploads/<?= basename($post->getImage()) ?>" alt="<?= $post->getId() ?>">
                </div>
                <!--text-->
                <div class="blog-text">
                    <span><?= $post->getSujet() ?></span>
                    <p><?= $post->getContenu() ?></p>
                    <a href="add_commentaire.php">Commenter</a>
                </div>
                 </div>
            </div>
            <?php endforeach; ?>
         </section>
  
</div>

        <script src="./back-office.js"></script>
    </body>

</html>
   
         <?php endif; ?>
