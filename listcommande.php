<?php
include '../Controller/CommandeC.php';
$commandeC = new CommandeC();
$list = $commandeC->listcommande();
?>
<html>
<head></head>
<body>
    <center>
        <h1>Liste des commandes</h1>
        <h2>
            <a href="addcommande.php">Add Commande</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Commande</th>
            <th>Nombre de produit(s)</th>
            <th>Date passage de la commande</th>
            <th>Date recue de la commande</th>
            <th>Id Produit</th>
            <th>Prix Totale</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $commande) {
        ?>
            <tr>
                <td><?= $commande['id_commande']; ?></td>
                <td><?= $commande['nb_prod']; ?></td>
                <td><?= $commande['date_passage_commande']; ?></td>
                <td><?= $commande['date_recue_commande']; ?></td>
                <td><?= $commande['prix_tot']; ?></td>
                <td align="center">
                    <form method="POST" action="updatecommande.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $commande['id_commande']; ?> name="id_commande">
                    </form>
                </td>
                <td>
                    <a href="deletecommande.php?id_commande=<?php echo $commande['id_commande']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>