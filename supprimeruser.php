<?php
include '../controller/usersC.php';
$UserC=new usersC();
$UserC->supprimeruser($_GET["id_user"]);

header('Location: afficheruser.php');
?>