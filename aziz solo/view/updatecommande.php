<?php
include '../model/Commande.php';
include '../Controller/CommandeC.php';

$error = "";
$commandeC = new CommandeC();

if (isset($_POST["nb_prod"]) &&
    isset($_POST["date_passage_commande"]) &&
    isset($_POST["date_recue_commande"]) &&
    isset($_POST["id_commande"])) {
    
    $commande = new Commande(
        $_POST["nb_prod"],
        $_POST["date_passage_commande"],
        $_POST["date_recue_commande"]
    );
    
    $commandeC->updatecommande($commande, $_POST["id_commande"]);
    header('Location:listcommande.php');
} else {
    $error = "Missing information";
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listcommande.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_commande'])) {
        $commande = $commandeC->showcommande($_POST['id_commande']);
    ?>

    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="nb_prod">Nombre de produit(s):</label>
                </td>
                <td>
                    <input type="number" name="nb_prod" value="<?php echo $commande['nb_prod']; ?>" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date_passage_commande">Date passage de la commande:</label>
                </td>
                <td>
                    <input type="date" name="date_passage_commande" value="<?php echo $commande['date_passage_commande']; ?>" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date_recue_commande">Date recue de la commande:</label>
                </td>
                <td>
                    <input type="date" name="date_recue_commande" value="<?php echo $commande['date_recue_commande']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id_commande" value="<?php echo $_POST['id_commande']; ?>">
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>
</html>
