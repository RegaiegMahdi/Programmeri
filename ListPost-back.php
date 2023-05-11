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
                        <img src=".image/logo.png">
                        <h2>SW<span class="title">EAT</span> SOCIETY</h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">close</span>
                    </div>
                </div>
                <a href="#" class="active">
                        <span class="material-icons-sharp"></span>
                        <h1>Dashboard</h1>
                    </a>
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
                    <a href="index-back_post.php"class="active">
                        <span class="material-icons-sharp">book_online</span>
                        <h3>Reservation</h3>
                    </a>
                </div>
                </div>
            </aside>
            </div>
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
            
         </div>
         
        
            
         <section id="blog">
        
            <div class="blog-heading">
             
            
           
            <div class="blog-container">
                 <!--box1-->
                 <?php if (count($posts) > 0): ?>
            <?php foreach ($posts as $post): ?>
                 <div class="blog-box">
                <!--img-->
                <div class="blog-img">
                <td>
                    <img class="product-image" src="uploads/<?= basename($post->getImage()) ?>" alt="<?= $post->getId() ?>">
                    </td>
                </div>
                
                <!--text-->
                <div class="blog-text">
                    <span><?= $post->getSujet() ?></span>
                    <p><?= $post->getContenu() ?></p>
                    <a href="deletepost.php?id=<?php echo $post->getId(); ?>">Delete</a>
                    
                        <form method="POST" action="updatepost.php">
                    
                    <input type="hidden" name="id" value="<?= $post->getId() ?>">
                    <input type="submit" name="update" value="Update">
                        
                    
                </div>
                 </div>
                 </div>
                 
                 <?php endforeach; ?>
                 <?php endif; ?>
                 </div>
                
            </div>
         </section>
  
         </div>
         </div>

        <script src="./back-office.js"></script>
    </body>

</html>