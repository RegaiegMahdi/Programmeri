
<?php
include "../Controller/ReclamationC.php";
$ReclamationC = new ReclamationC();
$list = $ReclamationC->listReclamation();
?>
<?php

var_dump($_POST);
// Include the controller and reponse class
include '../Controller/reponseC.php';

// Create an instance of the controller
$reponseC = new reponseC();

// Get all reponses
$reponses = $reponseC->getReponses();
$reponses1 = $reponseC->listReponses();

?>

<?php

// Appel de la fonction pour récupérer les résultats de la jointure
require_once '../config.php';
require_once '../Model/reponses.php';

$reponseC = new ReponseC(); // Create an instance of the CommentaireC class
$results = $reponseC->joinTables();


// Output the results


?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>SWEAT SOCIETY</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="style_back.css">
    </head>
    <body>
        <div class="container">
            <aside>
                <div class="top">
                    <div class="logo">
                        <img src="logo.png">
                        <h2>SW<span class="title">EAT</span> SOCIETY</h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">close</span>
                    </div>
                </div>
                <div class="sidebar">
                <a href="afficheruser.php" class="active">
                        <span class="material-icons-sharp">book_online</span>
                        <h3>Dashboard</h3>
                    </a>
                <a href="afficheruser.php" class="active">
                        <span class="material-icons-sharp">person</span>
                        <h3>Utilisateur</h3>
                    </a>
                    <a href="index-back-rec.php" class="active">
                        <span class="material-icons-sharp">chat</span>
                        <h3>Reclamation</h3>
                    </a>
                   <!-- <a href="#"class="active">
                        <span class="material-icons-sharp">rate_review</span>
                        <h3>Reponse</h3>
                    </a>-->
                    <a href="listproduit.php"class="active">
                         <span class="material-icons-sharp"> production_quantity_limits  </span>
                         <h3>Produit</h3>
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
                <div class="row">
				
                <a href="pdf.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span>Télécharger PDF</a>

			</div>
                <section class="List">
		<div class="Tablelist">
			<table class="tableview">
				<tr class="TitleTab">
					<th class="styleth">Id Reclamation</th>
					<th class="styleth">Id Client</th>
					<th class="styleth">Email client</th>
					<th class="styleth">Sujet de la réclamation</th>
					<th class="styleth">Message de la réclamation</th>
					<th class="styleth">statut de la reclamation</th>
                    <th class="styleth">Répondre au réclamation</th>
                    <th class="styleth">supprimer</th>
					<th><a class="toggle-edit"><i class="edit-del-icon uil uil-edit"></i></a></th>
					<th><a class="toggle-add"><i class="edit-del-icon uil uil-book-medical"></i></a></th>
				</tr>
				<?php
        foreach ($list as $Reclamation) 
        {
        ?>
					<tr>
                        <td class="styleth"><?= $Reclamation['Id_R']; ?></td>
                        <td class="styleth"><?= $Reclamation['id_Client']; ?></td>
                        <td class="styleth"><?= $Reclamation['Email']; ?></td>
                        <td class="styleth"><?= $Reclamation['Sujet_R']; ?></td>
                        <td class="styleth"><?= $Reclamation['Message_R']; ?></td>
                        <td class="styleth"><?= $Reclamation['Statut_R']; ?></td>
						<!--<td>
							
							<form method="POST" action="updateReclamation.php">
							<a href="updateReclamation.php?Id_L="><i class="edit-del-icon uil uil-edit"></i></a>
							</form>
						</td>-->
                        <td>
                         <a href="repondre.php?Id_R=<?php echo $Reclamation['Id_R']; ?>"><span>Repondre</span> </a>
                        </td>
						<td>
							<a href="deleteReclamation.php?Id_R=<?php echo $Reclamation['Id_R']; ?>">Delete</a>
						</td>
					</tr>
                    <?php
        }
        ?>	
			</table>
		</div>
		
	</section>
    <!DOCTYPE html>
<html>
<head>
	<title>Reponse CRUD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!--<h1>Reponse réclamation</h1>
	<div class="container">
		<h2>Ajouter Reponse</h2>
		<form action="addReponse.php" method="POST">
        <table border="1">
		<tr>
			<td><label for="contenu">Contenu:</label></td>
			<td><textarea name="contenu" required></textarea></td>
		</tr>
		<tr>
			<td><label for="statut">Statut:</label></td>
			<td><input type="text" name="statut" required></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Add Reponse"></td>
		</tr>
	</table>
</form>
	</div>-->
  
    <h1>Liste de Reponses</h1>
    <div class="container">
        <?php if (count($reponses) > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Contenu</th>
                    <th>Statut</th>
                    <th>Id_R</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($reponses as $reponse): ?>
                    <tr>
                        <td><?= $reponse->getId_rep() ?></td>
                        <td><?= $reponse->getContenu() ?></td>
                        <td><?= $reponse->getStatut() ?></td>
                        <td><?= $reponse->getId_R() ?></td>

                        <td align="center">
                            <form method="POST" action="updatereponse.php">
                                <input type="hidden" name="id" value="<?= $reponse->getId_rep() ?>">
                                <input type="submit" name="update" value="Update">
                            </form>
                        </td>

                        <td>
                            <a href="deletereponse.php?id=<?php echo $reponse->getId_rep(); ?>&Id_R=2369">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No reponses found.</p>
        <?php endif; ?>
    </div>

    <!--<h1>Réclamation et Réponses</h1>
    <table>
        <thead>
            <tr>
                <th>ID reclamation</th>
                <th>email</th>
                <th>Sujet</th>
                <th>message</th>
                <th>statut</th>
                <th>contenu reponse</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['Id_R'] ?></td>
            <td><?= $row['Email'] ?></td>
            <td><?= $row['Sujet_R'] ?></td>
            <td><?= $row['Message_R'] ?></td>
            <td><?= $row['Statut_R'] ?></td>
            <td><?= $row['contenu'] ?></td>
        </tr>
    <?php endforeach; ?>
    
    

        </tbody>-->
</body>
                </right>
        </div>
        <script src="./back-office.js"></script>
    </body>
</html>