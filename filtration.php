<?php
include '../Controller/commentaireC.php';
require_once '../config.php';
require_once '../Model/commentaire.php';

$commentaireC = new CommentaireC();
$results = $commentaireC->joinTables();

// Get the words to censor
$db = config::getConnexion();
$req = $db->query("SELECT mots FROM commentaire");

$mots = [];
$rp = [];

while ($m = $req->fetch()) {
    array_push($mots, $m['mots']);
    $r = '';
    for ($i = 0; $i < strlen($m['mots']); $i++) {
        $r .= '*';
    }
    array_push($rp, $r);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SWEAT SOCIETY</title>
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
                    <td><?= str_replace($mots, $rp, strtolower($row['contenu_c'])) ?></td>
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
        <a href
