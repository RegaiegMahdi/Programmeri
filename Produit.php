<?php

class Produit
{
    private $id_produit = null;
    private $nom_produit = null;
    private $prix_produit = null;
    
    public function __construct($nom_produit, $prix_produit)
    {
        $this->nom_produit = $nom_produit;
        $this->prix_produit = $prix_produit;
    }
    public function setidprd($id_produit)
    {
        $this->id_produit = $id_produit;
    }
    public function getidprd()
    {
        return $this->id_produit;
    }
    public function getHPprd()
    {
        return $this->nom_produit;
    }
    public function setHPprd($nom_produit)
    {
        $this->nom_produit = $nom_produit;
    }
    public function getManufacturerprd()
    {
        return $this->prix_produit;
    }
    public function setManufacturerprd($prix_produit)
    {
        $this->prix_produit = $prix_produit;
    }
}
?>