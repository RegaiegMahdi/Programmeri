<?php
include '../Controller/ReservationC.php';
$ReservationC = new ReservationC();
$ReservationC->deleteReservation($_GET["id"]);
header('Location:ListeReservation.php');
?>