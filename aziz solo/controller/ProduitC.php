<?php
require_once '../config.php';

class ProduitC
{
    public function listproduit() //affichage de produit
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $service = $query->fetch();
            $res = [];
            for ($x = 0; $service; $x++) {
                $res[$x] = $service;
                $service = $query->fetch();
            }
            return $res;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
   
    function deleteproduit($id_produit)
    {
        $sql = "DELETE FROM produit WHERE id_produit = :id_produit";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_produit', $id_produit);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addproduit($Produit)
    {
        $sql = "INSERT INTO produit (nom_produit, prix_produit) 
        VALUES (:nom_produit,:prix_produit)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_produit' => $Produit->getHPprd(),
                'prix_produit' => $Produit->getManufacturerprd(), 
                          
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showproduit($id_produit)
    {
        $sql = "SELECT * FROM produit where id_produit = $id_produit";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $id_produit = $query->fetch();
            return $id_produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateproduit($Produit, $id_produit)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE produit SET    
              nom_produit = :nom_produit,              
              prix_produit = :prix_produit 
            WHERE id_produit= :id_produit'
        );
        $query->execute([
            'id_produit' => $id_produit,
            'nom_produit' => $Produit->getHPprd(),
            'prix_produit' => $Produit->getManufacturerprd(), 
        ]);
    } catch (PDOException $e) {
       echo $e->getMessage();
    }
}

    
}
?>
