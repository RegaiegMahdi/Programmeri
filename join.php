<?php
include '../Controller/reponseC.php';
// Appel de la fonction pour récupérer les résultats de la jointure
require_once '../config.php';
require_once '../Model/reponses.php';

$reponseC = new ReponseC(); // Create an instance of the CommentaireC class
$results = $reponseC->joinTables(); // Call the joinTables() function

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
                <th>ID reclamation</th>
                
                <th>email</th>
                <th>Sujet</th>
                <th>message</th>
                <th>statut</th>
                <th>contenu reponse</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['Id_R'] ?></td>
          
            <td><?= $row['Email'] ?></td>
            <td><?= $row['Sujet_R'] ?></td>
            <td><?= $row['Message_R'] ?></td>
            <td><?= $row['Statut_R'] ?></td>
            <td><?= $row['contenu'] ?></td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>