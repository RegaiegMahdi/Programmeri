<?php
include_once "../Model/Reservation.php";
include_once "../Controller/ReservationC.php";
$ReservationC = new ReservationC();
var_dump($_POST);
if (
    isset($_POST['dateeup']) &&
    isset($_POST['idClientup']) 
   ) 
   {
    if (
        !empty($_POST['dateeup']) && 
        !empty($_POST['idClientup']) 
       ) 
       {
        $r = $ReservationC->findReservationById($_POST['dateeup']);
        $Reservation = new Reservation(
            $_POST['dateeup'],
            $_POST['idClientup']
          
       
            );
        $ReservationC = new ReservationC();
        $ReservationC->updateReservation($Reservation, $_POST['dateeup']);
        header('location:listeReservation.php');
        } 
    else 
        {
            header('location:listeReservation.php');
        }
    }
else 
    {
        header('location:listeReservation.php');
    }
?>