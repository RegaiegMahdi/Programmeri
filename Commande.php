<?php

class Commande
{
    private $id_commande = null;
    private $nb_prod = null;
    private $date_passage_commande = null;
    private $date_recue_commande = null;
    private $id_p = null;
    private $prix_tot = null;
    
    public function __construct($nb_prod, $date_passage_commande, $date_recue_commande, $id_p, $prix_tot)
    {
        $this->nb_prod = $nb_prod;
        $this->date_passage_commande = $date_passage_commande;
        $this->date_recue_commande = $date_recue_commande;
        $this->id_p = $id_p;
        $this->prix_tot = $prix_tot;
    }
    public function setid($id_commande)
{
    $this->id_commande = $id_commande;
}

    public function getid()
    {
        return $this->id_commande;
    }
    public function getHP()
    {
        return $this->nb_prod;
    }
    public function setHP($nb_prod)
    {
        $this->nb_prod = $nb_prod;
    }
    public function getManufacturer()
    {
        return $this->date_passage_commande;
    }
    public function setManufacturer($date_passage_commande)
    {
        $this->date_passage_commande = $date_passage_commande;
    }
    public function getMaxSpeed()
    {
        return $this->date_recue_commande;
    }
    public function setMaxSpeed($date_recue_commande)
{
    $this->date_recue_commande = $date_recue_commande;
}

    public function setidp($id_p)
    {
        $this->id_p = $id_p;
    }
    public function getidp()
    {
        return $this->id_p;
    }
    public function setprixtot($prix_tot)
    {
    $this->prix_tot = $prix_tot;
    }
    public function getprixtot()
    {
    return $this->prix_tot;
    }
}
?>