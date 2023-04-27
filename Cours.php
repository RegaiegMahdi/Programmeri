<?php

class Cours
{
    // TODO Partie Déclaration Varialbles

    private  $IdClient;
    private  $numSalle;
    private  $nomCoach;
    private  $type;
   

    // TODO Constructeur

    public function __construct( $IdClient,  $numSalle, $nomCoach,  $type)
    {
        $this->IdClient = $IdClient;
        $this->numSalle = $numSalle;
        $this->nomCoach = $nomCoach;
        $this->type = $type;  
    }

    // TODO Getters & Setters

    

    public function getIdClient()
    {
        return $this->IdClient;
    }

    public function setIdClient(int $IdClient)
    {
        $this->IdClient = $IdClient;
    }

    public function getnumSalle()
    {
        return $this->numSalle;
    }

    public function setnumSalle(int $numSalle)
    {
        $this->numSalle = $numSalle;
    }

    public function getnomCoach()
    {
        return $this->nomCoach;
    }

    public function setnomCoach(string $nomCoach)
    {
        $this->nomCoach = $nomCoach;
    }

    public function gettype()
    {
        return $this->type;
    }

    public function settype(string $type)
    {
        $this->type = $type;
    }

   

 
}
