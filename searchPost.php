<?php
include '../Controller/postC.php';
$error = "";
$postC = new postC();

if (isset($_GET['sujet']) && !empty($_GET['sujet'])) {
    $list = $postC->showpubli($_GET['sujet']);
} else {
    $list = $postC->listPost();
}

if (empty($list)) {
    $error = "No post found";
}
?>

<html>
<head></head>
<body>
    <div>
        <form action="" method="GET">
            <input type="text" name="sujet" id="label" placeholder="donner le sujet du post">
            <input type="submit" value="Search">
        </form>
    </div>
    <center>
        <h1>Posts</h1>
    </center>
    <?php if (!empty($error)): ?>
        <p><?= $error ?></p>
    <?php else: ?>
        <table border="1" align="center" width="70%">
            <tr>
                <th>Id post</th>
                <th>Contenu</th>
                <th>Sujet</th>
                <th>image</th>
            </tr>
            <?php foreach ($list as $post): ?>
                <tr>
                    <td><?= $post['id']; ?></td>
                    <td><?= $post['contenu']; ?></td>
                    <td><?= $post['sujet']; ?></td>
                    <td><img class="product-image" src="uploads/<?= basename($post['image']) ?>" alt="<?= $post['sujet'] ?>" width="80"></td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>


