


<?php
include '../Controller/CommandeC.php';
include '../Controller/ProduitC.php';
$com=new CommandeC();
$prod=new ProduitC();
$listproduit=$prod->listproduit();
foreach($listproduit as $ser){
    if($ser["id_produit"] == $_GET["nb_prod"]){
        $commande= new $commande($ser['nb_prod'],$ser['date_passage_commande'],$ser['date_recue_commande'],$ser['id_p'],$ser['prix_tot=nb_prod*prix_produit']);
        $com->addcommande($commande);
        header('Location: listcommande.php');
    }
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
