<?php



var_dump($_POST);
// Include the controller and prost class
include '../Controller/commentaireC.php';

// Create an instance of the controller
$commentaireC = new commentaireC();

// Get all products
$commentaires = $commentaireC->getComment();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="list-design.css">
</head>
<body>
    <h1>List of comments</h1>
    <table class="list">
        <?php if (count($commentaires) > 0): ?>
            <thead>
                <tr>
                    <th>Contenu</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
                <?php foreach ($commentaires as $commentaire): ?>
                  <tbody>  
                    <tr>
                        <td><?= $commentaire->getContenu_c() ?></td>
                        
                        <td align="center">
                        <form method="POST" action="updateCommentaire.php">
						
    <input type="hidden" name="id" value="<?= $commentaire->getId_c() ?>">
    <input type="submit" name="update" value="Update">
    
     
	
</form>

<td>
<a href="deleteCommentaire.php?id=<?php echo $commentaire->getId_c(); ?>">Delete</a>

                </td>

                        </td>
                        <td>
						<td>
						
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                  </tbody>
            </table>
        <?php else: ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
