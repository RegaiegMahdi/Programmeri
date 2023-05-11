<?php
include '../controller/usersC.php';
$usersC = new usersC();
$id_user = $_GET["id_user"];
$users = $usersC->recupereruser($id_user);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
	<style>
		body {
			background-color: #fff; /* blanc */
			color: #333; /* gris foncé */
			font-family: Arial, sans-serif;
		}
		
		form {
			width: 60%;
			margin: 20px auto;
			background-color: #f5f5f5; /* gris clair */
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.3); /* ombre */
			padding: 20px;
		}
		
		label {
			display: block;
			margin-bottom: 8px;
			font-size: 16px;
			font-weight: bold;
		}
		
		input[type="text"], input[type="email"], input[type="password"] {
			width: 100%;
			padding: 12px;
			border-radius: 4px;
			border: 1px solid #ccc; /* gris clair */
			font-size: 16px;
			margin-bottom: 20px;
			box-sizing: border-box;
		}
		
		input[type="submit"] {
			background-color: #0077be; /* bleu */
			color: #fff; /* blanc */
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}
		
		input[type="submit"]:hover {
			background-color: #00599d; /* bleu plus foncé */
		}
     
	</style>
</head>
<body>

<form action="modifieruser.php?id_user=<?php echo $id_user ?>" method='POST' <table class="form-style" enctype="multipart/form-data"
>
                      <div class="form-group">
                        <label for="nom_user">Nom</label>
                        <input type="text" class="form-control"  name="nom_user" value="<?php echo $users['nom_user'];?>">
                      </div>
                      <div class="form-group">
                        <label for="prenom_user">Prenom</label>
                        <input type="text" class="form-control"  name="prenom_user" value="<?php echo $users['prenom_user'];?>">
                      </div>
                     
                   
                      <div class="form-group">
                        <label for="email_user">Email</label>
                        <input type="text" class="form-control"  name="email_user"value="<?php echo $users['email_user'];?>">
                      </div>
                      <div class="form-group">
                        <label for="password">Mot De Passe</label>
                        <input type="text" class="form-control"  name="mdp_user" value="<?php echo $users['mdp_user'];?>">
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2">modifier</button>
                      <button type="submit" >  <a href="afficheruser.php" class="btn">Retour</a></button>
                    
                  </form>
</body>
</html>
