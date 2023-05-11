<?php

var_dump($_POST);
// Include the controller and reponse class
include '../Controller/reponseC.php';

// Create an instance of the controller
$reponseC = new reponseC();

// Get all reponses
$reponses = $reponseC->getReponses();

?>


