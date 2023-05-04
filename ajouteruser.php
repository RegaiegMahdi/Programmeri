<?php
include '../controller/usersC.php';
$user=new usersC ();

if(

    isset($_POST['register-nom_user'])&&isset($_POST['register-prenom_user'])
    &&isset($_POST['register-email_user'])&&isset($_POST['register-mdp_user'])  
){
    $users = new users ($_POST['register-nom_user'],$_POST['register-prenom_user'],$_POST['register-email_user'],$_POST['register-mdp_user']);
    $user->ajouteruser($users);
   header('Location: inscription.php');

}
else
{
echo 'el forum mazelll na9esss hooooooooooooooy';
}
?>