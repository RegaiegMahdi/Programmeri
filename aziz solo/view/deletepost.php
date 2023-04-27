<?php
include '../Controller/postC.php';
$postC = new postC();
$postC->deletePost($_GET["id"]);
header('Location:index-back.php');
?>