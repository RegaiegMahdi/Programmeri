
<?php
include_once "../Model/Reclamation.php";
include_once "../Controller/ReclamationC.php";
$ReclamationC = new ReclamationC();
var_dump($_POST);
if (
    isset($_POST['idrup']) &&
    isset($_POST['idClientup']) &&
    isset($_POST['Emailup']) &&
    isset($_POST['Sujetup']) &&
    isset($_POST['Messageup']) &&
    isset($_POST['Statutup'])
   ) 
   {
    if (
        !empty($_POST['idrup']) &&
        !empty($_POST['idClientup']) && 
        !empty($_POST['Emailup']) && 
        !empty($_POST['Sujetup']) && 
        !empty($_POST['Messageup']) && 
        !empty($_POST['Statutup'])
       ) 
       {
        $r = $ReclamationC->findReclamationById($_POST['idrup']);
        $Reclamation = new Reclamation(
            $_POST['idrup'],
            $_POST['idClientup'],
            $_POST['Emailup'],
            $_POST['Sujetup'],
            $_POST['Messageup'],
            $_POST['Statutup']
            );
        $ReclamationC = new ReclamationC();
        $ReclamationC->updateReclamation($Reclamation, $_POST['idrup']);
        header('location:index2.php');
        } 
    else 
        {
            header('location:index2.php');
        }
    }
else 
    {
        header('location:index2.php');
    }
?>