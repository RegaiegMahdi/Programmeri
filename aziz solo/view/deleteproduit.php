<?php
include '../Controller/ProduitC.php';
$produitC = new ProduitC();
$produitC->deleteproduit($_GET["id_produit"]);
header('Location:listproduit.php');
