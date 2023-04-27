<?php
include "../config.php";
include_once "../Model/Cours.php";
class CoursC
{

    public function listCours()
    {
        try 
        {
            $pdo = config::getConnexion();
            $sql = "SELECT * FROM cours";
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

  

    public function addCours($Cours)
    {
        try {
            
            
            $pdo = config::getConnexion();
            $sql = "INSERT INTO cours ( id_Client, num_salle, nom_coach, typee) 
            VALUES (:idc, :idR, :sujetr, :types )";
            $query = $pdo->prepare($sql);
            $query->execute([
                "idc" => $Cours->getIdClient(),
                "idR" => $Cours->getnumSalle(),
                "sujetr" => $Cours->getnomCoach(),
                "types" => $Cours->gettype()
              
               
            ]);
        } catch (PDOException $e) {
            echo "Ajout Echouer: " . $e->getMessage();
        }
    }

    public function deleteCours($IdClient)
    {
        $sql="DELETE FROM cours where id_Client = :id_Client";
        $db=config::getConnexion();
        $query=$db->prepare($sql);
            $query->bindValue(':id_Client', $IdClient);
        try {
            $query->execute();
        } catch (Exception $e) {
            die('Erreur:'.$e->getMessage());
        }
    }
    
    public function findCoursById($id)
    {
        try {

            $pdo = config::getConnexion();
            $sql = "SELECT * FROM `Cours` WHERE Id_Client=" . $id . "";
            $query = $pdo->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            return $result;
        } catch (PDOException $e) {
            echo "Pas de client: " . $e->getMessage();
        }
    }

    public function updateCours($Cours, $id)
    {
        try {

            $pdo = config::getConnexion();
            $sql = "UPDATE `Cours` SET  `num_salle`=:idR,`nom_coach`=:sujetr,`typee`=:typee WHERE id_Client=:idrr";
            $query = $pdo->prepare($sql);
            $query->execute([
                
                "idR" => $Cours->getnumSalle(),
                "sujetr" => $Cours->getnomCoach(),
                "typee" => $Cours->gettype(),
                "idrr" => $id
            ]);
        } catch (PDOException $e) {
            echo "Modification Echouer: " . $e->getMessage();
        }
    }


}
