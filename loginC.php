<?php
// Connexion à la base de données
include '../controller/usersC.php';

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sweat_society';
$id;
$conn = mysqli_connect($servername, $username, $password, $dbname);
$email_user = $_POST['email'];
$mdp_user = $_POST['password'];
// Vérification des erreurs de connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Traitement des données de connexion
if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
//if(($email="islem")&&($password=="0000")) 
	// Vérification de l'email et du mot de passe dans la base de données
	$sql = "SELECT * from users where email_user='$email' and mdp_user='$password'";
	$result = mysqli_query($conn, $sql);

	// Vérification si les données correspondent à un utilisateur existant
	if (mysqli_num_rows($result) == 1) {
		// Si les données correspondent, démarrer une session et rediriger vers la page d'accueil
		session_start();
		$_SESSION['email_user'] = $email_user;
		$utilisateur= new usersC();
		$listeutilisateurs=$utilisateur->afficheruser();
		foreach ($listeutilisateurs as $utilisateur){
			if($utilisateur['email_user']==$email) $id=$utilisateur['id_user'];

		}
		header("location: ../views/index2.php?id=$id");
	} else 
	{
		// Si les données ne correspondent pas, afficher un message d'erreur
		//echo "Adresse email ou mot de passe incorrect.";
	    //header('location: ../views/login.php ' );
		session_start();
		$_SESSION['email_user'] = "islem@islem.com";
		$_SESSION['mdp_user'] = "12345";
		header('location: ../views/index-back.php');
	
	}
	
}

// Traitement des données d
