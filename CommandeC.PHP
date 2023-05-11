<?php
require_once '../config.php';
include '..\model\Commande.php';

class CommandeC
{
    public function listcommande() //affichage de Commande
    {
        $sql = "SELECT * FROM commande";
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
    
   
    function deletecommande($id_commande)
    {
        $sql = "DELETE FROM commande WHERE id_commande = :id_commande";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_commande', $id_commande);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addcommande($Commande,$id_produit)
{
    $sql = "INSERT INTO commande (nb_prod, date_passage_commande, date_recue_commande, id_p, prix_tot) 
    VALUES (:nb_prod,:date_passage_commande,:date_recue_commande,:id_p,:prix_tot)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            ':nb_prod' => $Commande->getHP(),
            ':date_passage_commande' => $Commande->getManufacturer(),
            ':date_recue_commande' => $Commande->getMaxSpeed(),
            ':id_p' => $id_produit,
            ':prix_tot' => $Commande->getprixtot(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    function showcommande($id_commande)
    {
        $sql = "SELECT * FROM commande where id_commande = $id_commande";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $id_commande = $query->fetch();
            return $id_commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatecommande($Commande, $id_commande, $id_produit)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE commande SET    
                  nb_prod = :nb_prod,              
                  date_passage_commande = :date_passage_commande, 
                  date_recue_commande = :date_recue_commande,
                  id_p = :id_p,
                  prix_tot = :prix_tot 
                WHERE id_commande= $id_commande "
            );
            $query->execute([
                'nb_prod' => $Commande->getHP(),
                'date_passage_commande' => $Commande->getManufacturer(), 
                'date_recue_commande' => $Commande->getMaxSpeed(),
                'id_p' => $id_produit,
                'prix_tot' => $Commande->getprixtot(),
            ]);
        } catch (PDOException $e) {
           echo $e->getMessage();
        }
    }
    
    function joinProduit($id_produit){
        $sql=("SELECT * FROM produit INNER JOIN commande on produit.id_produit  = commande.id_p WHERE commande.id_p = $id_produit");
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }

    function recuperercommande($numero){
        $sql="SELECT * FROM commande where id_commande=$numero";
        $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    $query->execute();
    $Pharmacie=$query->fetch();
    return $Pharmacie;
    }catch (Exception $e){
        $e->getMessage();}
    }
    
}
?>
