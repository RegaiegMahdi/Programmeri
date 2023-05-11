<?php
include '../Model/Cours.php';
include '../Controller/CoursC.php';
var_dump($_POST);
if (
    isset($_POST['idClientadd']) &&
    isset($_POST['numSalleadd']) &&
    isset($_POST['nomCoachadd']) &&
    isset($_POST['typeadd'])
   ) 
{

    if (
        !empty($_POST['idClientadd']) &&
        !empty($_POST['numSalleadd']) &&
        !empty($_POST['nomCoachadd']) &&
        !empty($_POST['typeadd']) 
       ) 
        {
        $Cours = new Cours(
            $_POST['idClientadd'],
            $_POST['numSalleadd'],
            $_POST['nomCoachadd'],
            $_POST['typeadd']
            );
        $CoursC = new CoursC();
        $CoursC->addCours($Cours);
        header('location:listCours.php');
        } 
    else 
        {
        header('location:listCours.php');
        }
    }
else 
    {
        header('location:listCours.php');
    }
?>