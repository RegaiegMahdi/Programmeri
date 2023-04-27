<?php
require '../Controller/CoursC.php';
$CoursC = new CoursC();
$CoursC->deleteCours($_GET["id"]);
header('Location:listCours.php');
?>

