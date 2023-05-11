<?php
include '../Controller/reponseC.php';
$reponseC = new reponseC();
$reponseC->deleteReponse($_GET["id"]);
$reponseC->updateReclamation2($_GET["Id_R"]);
header('Location:index-back.php');
?>
