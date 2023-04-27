<?php
// Include the CommentaireC class and the Commentaire class (assuming they are defined in separate files)
require_once '../Controller/commentaireC.php';
require_once '../Model/Commentaire.php';

$error = "";

// Create an instance of the controller
$commentaireC = new commentaireC();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the input fields
    $id_c = filter_input(INPUT_POST, 'Id_c', FILTER_SANITIZE_NUMBER_INT);
    $contenu_c = filter_input(INPUT_POST, 'contenu_c', FILTER_SANITIZE_STRING);

    // Validate the input fields
    if (empty($id_c) || empty($contenu_c)) {
        $error = "Missing information";
    } else {
        // Create a new Commentaire object
        $commentaire = new Commentaire($id_c, $contenu_c);

        // Update the Commentaire in the database
        $success = $commentaireC->updateCommentaire($commentaire);

        // Redirect the user to the index-back.php page if the Commentaire was successfully updated
        if ($success) {
            header('Location: index-back.php');
            exit;
        } else {
            $error = "Failed to update Commentaire";
        }
    }
}

// Check if an Id_c parameter was passed in the query string
if (isset($_GET['Id_c'])) {
    // Get the Commentaire from the database
    $commentaire = $commentaireC->showComment($_GET['Id_c']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Commentaire</title>
</head>
<body>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php if (isset($commentaire)): ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="Id_c">Id Commentaire:</label>
                    </td>
                    <td>
                        <input type="text" name="Id_c" id="Id_c" value="<?php echo $commentaire->getId_c(); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="contenu_c">Contenu Commentaire:</label>
                    </td>
                    <td>
                        <input type="text" name="contenu_c" id="contenu_c" value="<?php echo $commentaire->getContenu_c(); ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Update">
                    </td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
</body>
</html>