<?php
include '../Controller/commentaireC.php';

$error = "";

$commentaire = null;

// create an instance of the controller
$commentaireC = new commentaireC();

if (isset($_POST["contenu"])) {
    if (!empty($_POST['contenu'])) {
        $commentaire = new Commentaire(
            null,
            $_POST['contenu']
        );

        // add the comment
        $commentaireC->addCommentaire($commentaire);
        header('Location: commentaires.php'); // redirect to the comments page
        exit;
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product CRUD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Product CRUD</h1>
	<div class="container">
		<h2>Add a Comment</h2>
		<form action="add_commentaire.php" method="POST">
			<table border="1">
				<tr>
					<td><label for="name">Contenu:</label></td>
					<td><input type="text" name="contenu" required></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Add Comment"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
