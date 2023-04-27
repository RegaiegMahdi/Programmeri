
<?php
include_once "../Model/Cours.php";
include_once "../Controller/CoursC.php";
$CoursC = new CoursC();
var_dump($_POST);
if (
    isset($_POST['idClientup']) &&
    isset($_POST['numSalleup']) &&
    isset($_POST['nomCoachup']) &&
    isset($_POST['typeup']) 
   ) 
   {
    if (
        
        !empty($_POST['idClientup']) && 
        !empty($_POST['numSalleup']) && 
        !empty($_POST['nomCoachup']) && 
        !empty($_POST['typeup'])
       ) 
       {
        $r = $CoursC->findCoursById($_POST['idClientup']);
        $Cours = new Cours(
            $_POST['idClientup'],
            $_POST['numSalleup'],
            $_POST['nomCoachup'],
            $_POST['typeup']
       
            );
        $CoursC = new CoursC();
        $CoursC->updateCours($Cours, $_POST['idClientup']);
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