<?php



var_dump($_POST);
// Include the controller and prost class
include '../Controller/postC.php';

// Create an instance of the controller
$postC = new postC();

// Get all products
$posts = $postC->getPost();

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
    <h1>List of Posts</h1>
    <table class="list">
        <?php if (count($posts) > 0): ?>
            <thead>
                <tr>
                    <th>Contenu</th>
                    <th>Sujet</th>
                    <th>Image</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
                <?php foreach ($posts as $post): ?>
                  <tbody>  
                    <tr>
                        <td><?= $post->getContenu() ?></td>
                        <td><img class="product-image" src="uploads/<?= basename($post->getImage()) ?>" alt="<?= $post->getId() ?>" width="80"></td>

                        <td align="center">
                        <form method="POST" action="updatepost.php">
						
    <input type="hidden" name="id" value="<?= $post->getId() ?>">
    <input type="submit" name="update" value="Update">
    
     
	
</form>

<td>
<a href="deletepost.php?id=<?php echo $post->getId(); ?>">Delete</a>

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
