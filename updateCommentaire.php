<?php

include '../Controller/commentaireC.php';

$error = "";

// create product
$commentaire = null;

// create an instance of the controller
$commentaireC = new commentaireC();
if (
    isset($_POST["id"]) &&
    isset($_POST["contenu"]) 
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['contenu'])
    ) {
        $commentaire = new commentaire(
            $_POST['id'],
            $_POST['contenu']
        );
        $commentaireC->updateCommentaire($commentaire, $_POST["id"]);
        header('Location:index-back.php');
    } else {
        $error = "Missing information";
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Display</title>
</head>
<body>
    <hr>
    <div id="error">
    <?php echo $error; ?>
</div>

<?php
if (isset($_POST['id'])) {
    $commentaire = $commentaireC->showComment($_POST['id']);

?>

<form action="updateCommentaire.php" method="POST" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">Id Post:
                    </label>
                </td>
                <td><input type="text" name="id" id="id" value="<?php echo isset($commentaire['id']) ? $commentaire['id'] : ''; ?>" ></td>
</tr>
<tr>
<td>
<label for="contenu">Contenu Post:
</label>
</td>
<td><input type="text" name="contenu" id="contenu" value="<?php echo isset($commentaire['contenu']) ? $commentaire['contenu'] : ''; ?>"></td>
</tr>
<tr>



<tr>
<td colspan="2" align="center">
<input type="submit" value="Update">
</td>
</tr>
</table>
</form>

<?php
}
?>
</body>
</html>
