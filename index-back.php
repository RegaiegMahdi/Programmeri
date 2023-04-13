
<?php
include "../Controller/ReclamationC.php";
$ReclamationC = new ReclamationC();
$list = $ReclamationC->listReclamation();
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
                        <img src="C:/xampp/htdocs/projet/image/logo.png">
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
						<td>
							
							<!--<form method="POST" action="updateReclamation.php">
							<a href="updateReclamation.php?Id_L="><i class="edit-del-icon uil uil-edit"></i></a>
							</form>-->
						</td>
						<td>
							<a href="deleteReclamation.php?Id_L=<?php echo $Reclamation['Id_R']; ?>"><i class="edit-del-icon uil uil-trash-alt"></i></a>
						</td>
					</tr>
                    <?php
        }
        ?>	
			</table>
		</div>
		
	</section>
                </right>
        </div>
        <script src="./back-office.js"></script>
    </body>
</html>