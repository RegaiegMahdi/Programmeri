<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
	<title>Connexion</title>
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
		
		input[type="email"], input[type="password"] {
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
	<form method="post" action="../controller/loginC.php">
		<label for="email">Adresse email :</label>
		<input type="email" id="email" name="email" required>

		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password" required>

		<input type="submit" value="Connexion">
		<p> <a href="inscription.php">insciption</a>.</p>
	</form>
</body>
</html>




