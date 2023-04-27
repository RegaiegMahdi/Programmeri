<?php
include '../Controller/ProduitC.php';
$produitC = new ProduitC();
$list = $produitC->listproduit();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        /* Style the header */
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Style the link button */
        .add-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        /* Style the table */
        table {
            border-collapse: collapse;
            width: 70%;
            margin: auto;
        }

        /* Style table header */
        th {
            background-color: #333;
            color: white;
            text-align: left;
            padding: 8px;
        }

        /* Style table rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <h1>Liste des produits</h1>
</div>

<!-- Add button -->
<div style="text-align: center; margin-top: 20px;">
    <a href="addproduit.php" class="add-button">Add Produit</a>
</div>

<!-- Products table -->
<table>
    <tr>
        <th style="text-align: center; margin: 0 auto;">Id Produit</th>
        <th style="text-align: center; margin: 0 auto;">Nom du produit</th>
        <th style="text-align: center; margin: 0 auto;">Prix du produit</th>
        <th style="text-align: center; margin: 0 auto;">Update</th>
        <th style="text-align: center; margin: 0 auto;">Delete</th>
    </tr>
    <?php foreach ($list as $produit) { ?>
        <tr>
            <td><?= $produit['id_produit']; ?></td>
            <td><?= $produit['nom_produit']; ?></td>
            <td><?= $produit['prix_produit']; ?></td>
            <td>
                <form method="POST" action="updateproduit.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $produit['id_produit']; ?>" name="id_produit">
                </form>
            </td>
            <td>
                <a href="deleteproduit.php?id_produit=<?= $produit['id_produit']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>


</body>
</html>
