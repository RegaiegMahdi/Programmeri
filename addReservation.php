<?php
include '../Model/Reservation.php';
include '../Controller/ReservationC.php';
var_dump($_POST);
if (
    isset($_POST['dateeadd']) &&
    isset($_POST['idClientadd']) 
   ) 
{

    if (
        !empty($_POST['dateeadd']) &&
        !empty($_POST['idClientadd']) 
       ) 
        {
        $Reservation = new Reservation(
            $_POST['dateeadd'],
            $_POST['idClientadd']
            );
        $ReservationC = new ReservationC();
        $ReservationC->addReservation($Reservation);
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