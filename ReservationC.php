<?php
include "../config.php";
include_once "../Model/Reservation.php";
class ReservationC
{

    public function listeReservation()
    {
        try 
        {
            $pdo = config::getConnexion();
            $sql = "SELECT * FROM reservation";
            $query = $pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
        catch (PDOException $e) 
        {
            echo "error add: " . $e->getMessage();
        }
    }
    public function addReservation($Reservation)
    {
        try {
            
            
            $pdo = config::getConnexion();
            $sql = "INSERT INTO reservation ( datee, id_Client) 
            VALUES (:dt, :idc )";
            $query = $pdo->prepare($sql);
            $query->execute([
                "dt" => $Reservation->getdatee(),
                "idc" => $Reservation->getidClient()

              
               
            ]);
        } catch (PDOException $e) {
            echo "Ajout Echouer: " . $e->getMessage();
        }
    }
    public function deleteReservation(int $datee)
    {
        try {

            $pdo = config::getConnexion();
            $sql = "DELETE FROM `reservation` WHERE datee=" . $datee . "";
            $query = $pdo->prepare($sql);
            $query->execute();
            echo $query->rowCount() . " records deleted";
        } catch (PDOException $e) {
            echo "error add: " . $e->getMessage();
        }
    } 
    public function findReservationById($id)
    {
        try {

            $pdo = config::getConnexion();
            $sql = "SELECT * FROM `reservation` WHERE datee=" . $id . "";
            $query = $pdo->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            return $result;
        } catch (PDOException $e) {
            echo "Pas de client: " . $e->getMessage();
        }
    }
    public function updateReservation($Reservation, $id)
    {
        try {

            $pdo = config::getConnexion();
            $sql = "UPDATE `reservation` SET  `id_Client`=:idc  WHERE datee=:idr";
            $query = $pdo->prepare($sql);
            $query->execute([ 
                "idc" => $Reservation->getidClient(),
                "idr" => $id
            ]);
        } catch (PDOException $e) {
            echo "Modification Echouer: " . $e->getMessage();
        }
    }


}