<?php
include '../Controller/postC.php';
$error = "";
$postC = new postC();

if (isset($_GET['sujet']) && !empty($_GET['sujet'])) {
    $list = $postC->showpubli($_GET['sujet']);
} else {
    $list = $postC->listPost();
}

if (empty($list)) {
    $error = "No post found";
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
        <div>
        <form action="" method="GET">
            <input type="text" name="sujet" id="label" placeholder="donner le sujet du post"><br>
            <input type="submit" value="Search"><br>
        </form>
    </div>
    <center>
        <h1>Posts</h1><br><br>
    </center>
    <?php if (!empty($error)): ?>
        <p><?= $error ?></p>
    <?php else: ?>
        <table border="1" align="center" width="70%">
            <tr>
                <th>Id post</th>
                <th>Contenu</th>
                <th>Sujet</th>
                <th>image</th>
            </tr>
            <?php foreach ($list as $post): ?>
                <tr>
                    <td><?= $post['id']; ?></td>
                    <td><?= $post['contenu']; ?></td>
                    <td><?= $post['sujet']; ?></td>
                    <td><img class="product-image" src="uploads/<?= basename($post['image']) ?>" alt="<?= $post['sujet'] ?>" width="80"></td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
       
        
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

