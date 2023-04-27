<?php

class Reservation
{
    // TODO Partie Déclaration Varialbles

    private  $datee;
    private  $idClient;

    public function __construct( $datee, $idClient)
    {
        $this->datee = $datee;
        $this->idClient = $idClient;
          
    }
    public function getidClient()
    {
        return $this->idClient;
    }

    public function setidClient(int $idClient)
    {
        $this->idClient = $idClient;
    }

    public function getdatee()
    {
        return $this->datee;
    }

    public function setdatee(DateTime $datee)
    {
        $this->datee = $datee;
    }
}