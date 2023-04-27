<?php
include '../Controller/CommandeC.php';
$commandeC = new CommandeC();
$commandeC->deletecommande($_GET["id_commande"]);
header('Location:listcommande.php');
