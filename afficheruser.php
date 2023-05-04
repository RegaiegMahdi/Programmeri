<?php
include '../controller/usersC.php';
$userC = new usersC();
$listeUserC = $userC->afficheruser();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>SWEAT SOCIETY</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="style_back.css">
	<title>Tableau</title>
	<style>
		body {
			background-color: #fff; /* blanc */
			color: #333; /* gris foncé */
			font-family: Arial, sans-serif;
		}
		
		table {
			border-collapse: collapse;
			width: 80%;
			margin: 20px auto;
			background-color: #f5f5f5; /* gris clair */
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.3); /* ombre */
		}
		
		th, td {
			padding: 12px;
			text-align: left;
			border-bottom: 1px solid #ddd; /* gris plus clair */
			font-size: 16px;
		}
		
		th {
			background-color: #0077be; /* bleu */
			color: #fff; /* blanc */
			font-weight: bold;
		}
		
		tr:nth-child(even) {
			background-color: #e0e0e0; /* gris très clair */
		}
		
		tr:hover {
			background-color: #ccc; /* gris plus foncé */
		}
	</style>
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
                    <a href="afficheruser.php" class="active">
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
                </right>
        </div>
        <script src="./back-office.js"></script>
   
<body>
	<table>
		<thead>
			<tr>
				<th>id user </th>
				<th>Nom user</th>
				<th>Prénom user</th>
				<th>mail user</th>
                <th>mot de passe</th>
                <th>option supprimer </th>
                <th>option modifier</th>
			</tr>
		</thead>
		<tbody>
        <?php
                         foreach ($listeUserC as $users) {
                          ?>
			<tr>
				<td><?php echo $users['id_user'];?></td>
				<td><?php echo $users['nom_user'];?></td>
				<td><?php echo $users['prenom_user'];?></td>
				<td><?php echo $users['email_user'];?></td>
                <td><?php echo $users['mdp_user'];?></td>
                <td>

				<button type="submit"><a href="supprimeruser.php?id_user=<?php echo $users['id_user']; ?>" class="btn">Supprimer</a></button>
                            
                            </td>
							
                            <td>
							<button type="submit"><a href="formmodifier.php?id_user=<?php echo $users['id_user']; ?>" class="btn">modifier</a></button>
                          
                            </td>
                            </td>
			</tr>
            <?php
                            }
                            ?>
		</tbody>
	</table>
</body>
</html>
