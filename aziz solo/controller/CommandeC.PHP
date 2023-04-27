<?php
require_once '../config.php';

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

    function addcommande($Commande)
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
            ':id_p' => $Commande->getidp(),
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

    function updatecommande($Commande, $id_commande)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET    
                  nb_prod = :nb_prod,              
                  date_passage_commande = :date_passage_commande, 
                  date_recue_commande = :date_recue_commande,
                  id_p = :id_p,
                  prix_tot = :prix_tot 
                WHERE id_commande= :id_commande'
            );
            $query->execute([
                'id_commande' => $id_commande,
                'nb_prod' => $Commande->getHP(),
                'date_passage_commande' => $Commande->getManufacturer(), 
                'date_recue_commande' => $Commande->getMaxSpeed(),
                'id_p' => $Commande->getidp(),
                'prix_tot' => $Commande->getprixtot(),
            ]);
        } catch (PDOException $e) {
           echo $e->getMessage();
        }
    }
    
}
?>
