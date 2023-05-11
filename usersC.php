<?php
include_once '../config.php';
include '../model/user.php';
class usersC {

    function afficheruser(){
        $sql="SELECT * FROM users";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
   
    function supprimeruser($id_user){
        $sql=" DELETE FROM users WHERE id_user=:id_user";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_user' , $id_user);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajouteruser($users){

       $sql = "INSERT INTO users (nom_user,prenom_user,email_user,mdp_user)
                 VALUES (:nom_user, :prenom_user, :email_user, :mdp_user)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
            'nom_user'=> $users->getnom_user(),
            'prenom_user'=> $users->getprenom_user(),
            'email_user'=> $users->getemail_user(),
            'mdp_user'=> $users->getmdp_user()
       
        ]);
        $_SESSION['error']="data add seccsesfuly";
} catch (Exception $e){
    $e->getMessage();
}

    }
function modifieruser($id_user,$users){
       try{
        $db = config::getConnexion();
$query = $db->prepare('UPDATE users SET nom_user = :nom_user, prenom_user= :prenom_user, email_user= :email_user, mdp_user= :mdp_user WHERE id_user= :id_user');
$query->execute([
            'nom_user'=> $users->getnom_user(),
            'prenom_user'=> $users->getprenom_user(),
            'email_user'=> $users->getemail_user(),
            'mdp_user'=> $users->getmdp_user(),
            'id_user'=> $id_user
]);
    } catch (Exception $e){
        $e->getMessage();
}}


function recupereruser($id_user){
    $sql="SELECT * from users where id_user=$id_user";
    $db = config::getConnexion();
try{
    $query = $db->prepare($sql);
$query->execute();
$users=$query->fetch();
return $users;
}catch (Exception $e){
    $e->getMessage();}
}



}


?>