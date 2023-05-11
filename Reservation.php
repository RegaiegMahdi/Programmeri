<?php

class Reservation
{
    private $datee;
    private $idClient;

    public function __construct(int $datee, int $idClient)
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

    public function setdatee(int $datee)
    {
        $this->datee = $datee;
    }
}
