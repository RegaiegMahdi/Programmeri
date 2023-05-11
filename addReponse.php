<?php

include '../Controller/reponseC.php';

$error = "";

$reponse = null;

// create an instance of the controller
$reponseC = new reponseC();
if (
    isset($_POST["contenu"]) &&
    isset($_POST["statut"])
) {
    if (
        !empty($_POST['contenu']) &&
        !empty($_POST["statut"])
    ) {
        // create the reponse
        $reponse = new Reponse(
            null,
            $_POST['contenu'],
            $_POST['statut'],
            $_POST['Id_R']
        );
        
        // add the reponse
        $reponseC->addReponse($reponse);
        header('Location:index-back.php');
    } else {
        $error = "Missing information";
    }
}

?>

