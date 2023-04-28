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
        <!--navbar icon-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="design-searchPost-front.css">
        <script src="./script.js"></script>
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
           <div class="overlay"><
        
     
        <?php if (count($posts) > 0): ?>
            <?php foreach ($posts as $post): ?>
            <div class="blog-heading">
                
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
            </div>
            </div>
    </section>

 


  

    </body>
</html>

<?php endif; ?>