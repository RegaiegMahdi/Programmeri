
<?php
include '../Controller/postC.php';

$error = "";

// create product
$post = null;

// create an instance of the controller
$postC = new postC();
if (
    isset($_POST["id"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["sujet"]) &&
    isset($_FILES["image"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['contenu']) &&
        !empty($_POST["sujet"]) &&
        !empty($_FILES["image"])
    ) {
        $post = new post(
            $_POST['id'],
            $_POST['contenu'],
            $_POST['sujet'],
            $_FILES['image']['name']
        );
        $postC->updatePost($post, $_POST["id"]);
        header('Location:ListPost.php');
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="updatePost-back.css">
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
  <div>
  <hr>
    <div id="error">
    <?php echo $error; ?>
</div>

<?php
if (isset($_POST['id'])) {
    $post = $postC->showPost($_POST['id']);

?>
 <div class="wrapper">
 <h1>Modifier Un Post</h1>
<form action="updatepost.php" method="POST" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">Id Post:
                    </label>
                </td>
                <td><input type="text" name="id" id="id" value="<?php echo $post['id']; ?>" readonly></td>
</tr>
<tr>
<td>
<label for="contenu">Contenu Post:
</label>
</td>
<td><input type="text" name="contenu" id="contenu" value="<?php echo $post['contenu']; ?>"></td>
</tr>
<tr>
<td>
<label for="sujet">Sujet:
</label>
</td>
<td><input type="text" name="sujet" id="sujet" value="<?php echo $post['sujet']; ?>"></td>
</tr>

<tr>
<td>
<label for="image">Image:
</label>
</td>
<td><input type="file" name="image" id="image"></td>
</tr>
<tr>
<td colspan="2" align="center">
<button>Modifier</button>
</td>
</tr>
</table>
</form>

<?php
}
?>
	</div>
</div>
<?php

?>





        

   </right>
        </div>
        <script src="./back-office.js"></script>
    </body>
</html>


