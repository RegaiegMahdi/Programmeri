<?php
include_once "../Controller/ReclamationC.php";
$ReclamationC = new ReclamationC();
if (isset($_GET['Id_R']) && !empty($_GET['Id_R'])) {

    echo "id Reclamation: " . $_GET['Id_R'];
    $ReclamationC->deleteReclamatioN($_GET['Id_R']);
    header('location:index-back-rec.php');
} else {
    echo "id is not defined";
}
?>

