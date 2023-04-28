
<?php

include '../Controller/postC.php';

$error = "";


$post = null;
var_dump($_POST);

$postC = new postC();
$posts = $postC->getPost();
$htmlContent = file_get_contents('formulaire.html');
// create an instance of the controller

if (
    isset($_POST["contenu"]) &&
    isset($_POST["sujet"]) &&
    isset($_FILES["image"])
    
) {
    if (
        !empty($_POST['contenu']) &&
        !empty($_POST['sujet']) &&
        !empty($_FILES["image"])
        
    ) {
      // process the uploaded file
	  $target_dir = "uploads/";
	  $target_file = $target_dir . basename($_FILES["image"]["name"]);
	  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	  $allowed_extensions = array("jpg", "jpeg", "png", "gif");

	  // Check if the file is a valid image
	  if(in_array($imageFileType, $allowed_extensions)){
		  // move the file to the uploads folder
		  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);


        // create the post with the uploaded file path
            $post = new Post(
                null,
                $_POST['contenu'],
                $_POST['sujet'],
                $target_file
            );
            
            // add the post
			
            $postC->addPost($post);
            header('Location:listPost.php');
        } else {
            $error = "Invalid image file type. Allowed types: " . implode(", ", $allowed_extensions);
        }
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
    <?php 
  echo $htmlContent;
  ?>
	</div>
</div>






        

   </right>
        </div>
        <script src="./back-office.js"></script>
    </body>
</html>


















	