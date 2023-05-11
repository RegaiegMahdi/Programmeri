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
                <a href="afficheruser.php" class="active">
                        <span class="material-icons-sharp">person</span>
                        <h3>Utilisateur</h3>
                    </a>
                    <a href="index-back-rec.php" class="active">
                        <span class="material-icons-sharp">chat</span>
                        <h3>Reclamation</h3>
                    </a>
                    <a href="listReponse.php"class="active">
                        <span class="material-icons-sharp">rate_review</span>
                        <h3>Reponse</h3>
                    </a>
                    <a href="listproduit.php"class="active">
                         <span class="material-icons-sharp"> production_quantity_limits  </span>
                         <h3>Produit</h3>
                    </a>
                    <a href="#"class="active">
                        <span class="material-icons-sharp">list_alt</span>
                        <h3>Commande</h3>
                    </a>
                    <a href="index-back_post.php"class="active">
                        <span class="material-icons-sharp">pages</span>
                        <h3>Post</h3>
                    </a>
                    <a href="listCommentaire.php"class="active">
                        <span class="material-icons-sharp">comment</span>
                        <h3>Commentaire</h3>
                    </a>
                    <a href="index-back_cour.php"class="active">
                        <span class="material-icons-sharp">fitness_center</span>
                        <h3>Cours</h3>
                    </a>
                    <a href="listeReservation.php"class="active">
                        <span class="material-icons-sharp">book_online</span>
                        <h3>Reservation</h3>
                    </a>
                    <a href="login.php"class="active">
                        <span class="material-icons-sharp">book_online</span>
                        <h3>LOG OUT</h3>
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

  
</div>

        <script src="./back-office.js"></script>
    </body>

</html>