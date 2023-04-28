<?php
include '../Controller/commentaireC.php';
// Appel de la fonction pour récupérer les résultats de la jointure
require_once '../config.php';
require_once '../Model/commentaire.php';

$commentaireC = new CommentaireC(); // Create an instance of the CommentaireC class
$results = $commentaireC->joinTables(); // Call the joinTables() function

// Output the results


?>


<!DOCTYPE html>
<html>
<head>
    <title>Posts and Comments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Posts and Comments</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Post Content</th>
                <th>Image</th>
                <th>Subjet</th>
                <th>Commentaire</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['contenu'] ?></td>
            <td><img src="<?= $row['image'] ?>"></td> 
            <td><?= $row['sujet'] ?></td>
            <td><?= $row['contenu_c'] ?></td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
