<?php

include '../Controller/reponseC.php';

$error = "";

// create product
$reponse = null;

// create an instance of the controller
$reponseC = new reponseC();
if (
    isset($_POST["id"]) &&
    isset($_POST["contenu"])&&
    isset($_POST["statut"])  
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['contenu'])&&
        !empty($_POST['statut'])
    ) {
        $reponse = new $reponse(
            $_POST['id'],
            $_POST['contenu'],
            $_POST['statut']
        );
        $reponseC->updateReponse($commentaire, $_POST["id"]);
        header('Location:listReponse.php');
    } else {
        $error = "Missing information";
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponse Display</title>
</head>
<body>
    <hr>
    <div id="error">
    <?php echo $error; ?>
</div>

<?php
if (isset($_POST['id'])) {
    $reponse = $reponseC->showReponse($_POST['id']);

?>

<form action="updateReponse.php" method="POST" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">Id Post:
                    </label>
                </td>
                <td><input type="text" name="id" id="id" value="<?php echo isset($reponse['id']) ? $reponse['id'] : ''; ?>" ></td>
</tr>
<tr>
<td>
<label for="contenu">Contenu Post:
</label>
</td>
<td><input type="text" name="contenu" id="contenu" value="<?php echo isset($reponse['contenu']) ? $reponse['contenu'] : ''; ?>"></td>
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