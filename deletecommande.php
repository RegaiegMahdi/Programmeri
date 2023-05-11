<?php
include '../Controller/CommandeC.php';
$id_produit=$_GET['id_produit'];
$commandeC = new CommandeC();
$commandeC->deletecommande($_GET["id_commande"]);
header("Location: listcommande.php?id_produit=$id_produit");
?>
