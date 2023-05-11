<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<style>
		body {
			background-color: #fff; /* blanc */
			color: #333; /* gris foncé */
			font-family: Arial, sans-serif;
		}
		
		form {
			width: 500px;
			margin: 0 auto;
			background-color: #f5f5f5; /* gris clair */
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.3); /* ombre */
		}
		
		h1 {
			text-align: center;
			margin-bottom: 30px;
			color: #0077be; /* bleu */
		}
		
		label {
			display: block;
			margin-bottom: 8px;
			color: #555; /* gris moyen */
		}
		
		input[type=text], input[type=email], input[type=password] {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc; /* gris clair */
			border-radius: 4px;
			margin-bottom: 20px;
			font-size: 16px;
		}
		
		button[type=submit] {
			background-color: #0077be; /* bleu */
			color: #fff; /* blanc */
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			width: 100%;
		}
		
		button[type=submit]:hover {
			background-color: #005ea2; /* bleu plus foncé */
		}
	</style>
</head>
<body>
    
 
            <h1>Inscription</h1>
              <form action="ajouteruser.php" id="myForm" method="post">
                <div class="form-group">
                  <label for="#">Nom</label>
                  <input type="text" class="form-control" id="nom_user" placeholder="Nom" name="register-nom_user">
                  <span id="errorname"></span>
                </div>
                <div class="form-group">
                  <label for="#">Prénom</label>
                  <input type="text" class="form-control" id="prenom_user" placeholder="Prénom" name="register-prenom_user">
                  <span id="errorprenom"></span>
                </div>
                <div class="form-group">
                  <label for="#">E-mail</label>
                  <input type="email" class="form-control" id="email_user" placeholder="E-mail" name="register-email_user">
                  <span id="errormail"></span>
                </div>
               
                <div class="form-group">
                  <label for="#">Mot de passe</label>
                  <input type="password" class="form-control" id="mdp_user" placeholder="Mot de passe" name="register-mdp_user">
                  <span id="errorpassword"></span>
                </div>
               
               
                
                <button type="submit" class="btn btn-primary mr-2">S'inscrire</button>
                <p>Déjà un compte ? <a href="login.php">Connectez-vous ici</a>.</p>
               

              </form>
              <script>
                let myForm = document.getElementById('myForm');

myForm.addEventListener('submit', function(e) {
  let mynom = document.getElementById('nom_user');
  let myprenom = document.getElementById('prenom_user');
  let mymail = document.getElementById('email_user');
  let mymdp = document.getElementById('mdp_user');


  if (mynom.value == '') {
    let error = document.getElementById('errorname');
    error.innerHTML = "Le champs est requis";
    error.style.color = 'red';
    e.preventDefault();
  }
  if (myprenom.value == '') {
    let error = document.getElementById('errorprenom');
    error.innerHTML = "Le champs  est requis";
    error.style.color = 'red';
    e.preventDefault();
  }
  if (mymail.value == '') {
    let error = document.getElementById('errormail');
    error.innerHTML = "Le champs  requis";
    error.style.color = 'red';
    e.preventDefault();
  }
  if (mymdp.value == '') {
    let error = document.getElementById('errorpassword');
    error.innerHTML = "Le champs  requis";
    error.style.color = 'red';
    e.preventDefault();
  }
})
              </script>
	
</body>
</html>
