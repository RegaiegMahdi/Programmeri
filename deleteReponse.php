<?php
include '../Controller/reponseC.php';
$reponseC = new reponseC();
$reponseC->deleteReponse($_GET["id"]);
header('Location:index-back.php');
?>
