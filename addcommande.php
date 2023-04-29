<?php
include '../Controller/CommandeC.php';
include '../Controller/Commande.php';
$error = "";

// create produit
$commande = null;

$commandeC= new CommandeC();
if (isset($_POST["nb_prod"]) &&
    isset($_POST["date_passage_commande"])&&
    isset($_POST["date_recue_commande"])&&
    isset($_POST["prix_tot"])
    ){
    $commande = new Commande($_POST["nb_prod"], $_POST["date_passage_commande"], $_POST["date_recue_commande"], $_POST["prix_tot"]);
    $commandeC->addcommande($commande);
    header('Location:listcommande.php');
} else {
    $error = "";
}




?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="listcommande.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="nb_prod">Nombre de produit(s):
                    </label>
                </td>
                <td><input type="number" name="nb_prod" id="nb_prod" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="date_passage_commande">Date passage de la commande:
                    </label>
                </td>
                <td>
                    <input type="date" name="date_passage_commande" id="date_passage_commande">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date_recue_commande">Date recue de la commande:
                    </label>
                </td>
                <td>
                    <input type="date" name="date_recue_commande" id="date_recue_commande">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prix_tot">Prix total:
                    </label>
                </td>
                <td>
                    <input type="number" name="prix_tot" id="prix_tot">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                    <a href="listcommande.php" class="btn">show</a>
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
