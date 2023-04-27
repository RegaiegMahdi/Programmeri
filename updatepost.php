<?php

include '../Controller/postC.php';

$error = "";

// create product
$post = null;

// create an instance of the controller
$postC = new postC();
if (
    isset($_POST["id"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["sujet"]) &&
    isset($_FILES["image"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['contenu']) &&
        !empty($_POST["sujet"]) &&
        !empty($_FILES["image"])
    ) {
        $post = new post(
            $_POST['id'],
            $_POST['contenu'],
            $_POST['sujet'],
            $_FILES['image']['name']
        );
        $postC->updatePost($post, $_POST["id"]);
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
    $post = $postC->showPost($_POST['id']);

?>

<form action="updatepost.php" method="POST" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">Id Post:
                    </label>
                </td>
                <td><input type="text" name="id" id="id" value="<?php echo $post['id']; ?>" readonly></td>
</tr>
<tr>
<td>
<label for="contenu">Contenu Post:
</label>
</td>
<td><input type="text" name="contenu" id="contenu" value="<?php echo $post['contenu']; ?>"></td>
</tr>
<tr>
<td>
<label for="sujet">Sujet:
</label>
</td>
<td><input type="text" name="sujet" id="sujet" value="<?php echo $post['sujet']; ?>"></td>
</tr>

<tr>
<td>
<label for="image">Image:
</label>
</td>
<td><input type="file" name="image" id="image"></td>
</tr>
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
