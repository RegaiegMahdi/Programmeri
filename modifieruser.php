
<?php
include '../controller/usersC.php';
$id_user = $_GET["id_user"];
$usersC=new usersC();
if(
    isset($_POST['nom_user']) &&isset($_POST['prenom_user'])&&isset($_POST['email_user'])&&isset($_POST['mdp_user'])
 )
 
    
{
    $users = new users($_POST['nom_user'],$_POST['prenom_user'],$_POST['email_user'],$_POST['mdp_user']);
    $usersC->modifieruser($id_user,$users);
}
else
echo 'erreur';
header('Location: afficheruser.php');
?>